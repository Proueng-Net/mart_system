<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Category;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function index(){
        $data['products'] = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.name as category_name')
        ->orderBy('products.created_at', 'DESC')
        ->paginate(8);
        return view('admins.products.index', $data);
    }
    public function active(){
        $data['products'] = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->select('products.*', 'categories.name as category_name')
        ->where('status', "1")
        ->orderBy('products.created_at', 'DESC')
        ->paginate(8);
        return view('admins.products.index', $data);
    }
    public function deleted(){
        $data['products'] = DB::table('products')->join('categories', 'categories.id', '=', 'products.category_id')->select('products.*', 'categories.name as category_name')->where('status', "0")
        ->orderBy('products.created_at', 'DESC')
        ->paginate(8);
        return view('admins.products.index', $data);
    }
    
    public function create(){
        $data['categories'] = DB::table('categories')
            ->where('active', 1)
            ->get();
        return view('admins.products.create', $data);
    }

    public function save(Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->price = $request->priceDefault;
        $product->priceSell = $request->priceSell;
        if($request->hasFile('photo')){
            $product->photo = $request->file('photo')->store('assets/images/products', 'custom');
        }
        if($product->save()){
            return redirect()->route('product.index')->with('success', 'Product added successfull.');
        }else{
            return redirect()->route('product.index')->with('error', 'Cannot add product. Try again!');
        }
    }

    public function update(Request $request){
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->status = $request->active;
        $product->priceSell = $request->priceSell;
        $product->price = $request->priceDefault;
        $product->category_id = $request->category_id;
        if($request->hasFile('photo')){
            $product->photo = $request->file('photo')->store('assets/images/products', 'custom');
        }
        if($product->save()){
            return redirect()->route('product.index')->with('success', 'product updated successfull.');
        }else{
            return redirect()->back()->with('error', 'Cannot update product. Try again!');
        }
    }

    public function delete($id){
        $product = Product::find($id);
        $product->status = 0;

        if($product->save()){
            return redirect()->back()->with('success', 'Product deleted successfull.');
        }else{
            return redirect()->route('product.index')->with('error', 'Cannot delete product. Try again!');
        } 
    }

    public function edit($id){
        $data['categories'] = DB::table('categories')->get();
        $data['product'] = Product::find($id);
        return view('admins.products.edit', $data);
    }
}
