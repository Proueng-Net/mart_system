<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\InvoiceDeatil;
use DB;

class OrderController extends Controller
{

    public function index()
    {
        $data['cartItems'] = \Cart::getContent();
        $data['products'] = DB::table('products')->get();
        return view('admins.orders.index', $data);
    }


    public function addToCart(Request $request)
    {
        // dd($request->all());
        $product = DB::table('products')->find($request->id);
        \Cart::add([
            'id' => $request->id,
            'quantity' => $request->quantity,
            'name' => $product->name,
            'price' => $product->priceSell,
            'attributes' => array(
                'image' => $product->photo,
            )
          
        ]);
        return redirect()->back()->with('success', 'Product is Added to Cart Successfully !');
    }

    public function removeCart(Request $request, $id)
    {
        \Cart::remove($id);
        return redirect()->back()->with('success', 'Item Cart Remove Successfully !');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        return redirect()->back()->with('success', 'All Item Cart Remove Successfully !');

    }

    public function saveOrder(Request $request){
        $inv = new Invoice;
        $total_amount = 0;
        $count_inv = Invoice::whereYear('created_at', date('Y'))->count();
        if($count_inv==0){
            $inv_ref = $count_inv + 1;
        }else{
            $inv_ref = $count_inv;
        }
        $inv->inv_no = $this->invoiceRef($inv_ref);
        $inv->total_amount = $total_amount;
        $inv->created_by = auth()->user()->id;
        if($inv->save()){
          
            for($i=0; $i<count($request->id); $i++){
                $inv_detail = new InvoiceDeatil;
                $inv_detail->invoice_id = $inv->id;
                $inv_detail->product_id = $request->id[$i];
                $inv_detail->price = $request->price[$i];
                $inv_detail->quantity = $request->quantity[$i];
                $inv_detail->total_amount = $request->total[$i];
                if($inv_detail->save()){
                    \Cart::remove($request->id[$i]);
                }
                $total_amount += $request->total[$i];
            }
            Invoice::where('id', $inv->id)->update(['total_amount' => $total_amount]);

            session()->flash('print_url', route('invoice.print', $inv->id));
            
            return redirect()->route('invoice.detail', $inv->id)->with('success', 'Invoice created successfully !');
        }
        
        
    }

    public function invoiceRef($number, $prefix='INV', $digit=4){
        return $prefix.sprintf("%'.0$digit" . "d", $number + 1);
    }
}
