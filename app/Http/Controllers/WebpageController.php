<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class WebpageController extends Controller
{
    public function home(Request $request)
    {

        $data['products'] = DB::table('products')
            ->join('categories', 'categories.id', 'products.category_id')
            ->where('categories.active', 1)
            ->get();

        $data['categories'] = DB::table('categories')
            ->where('active', '1')
            ->get();

        $data['slideshows'] = DB::table('slideshows')
            ->where('status', '1')
            ->get();
        return view('frontEnds.index', $data);
    }

    public function ProductByCategory(Request $request, $name, $id)
    {
        $data['products'] = DB::table('products')
            ->where('status', 1)
            ->where('category_id', $id)
            ->get();
        $data['name'] = $name;
        return view('frontEnds.categoryAndProduct', $data);
    }

    public function edit($id)
    {
        $data['users'] = User::find($id);
        return view('frontEnds.index', $data);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->active = $request->active;
        $user->type_id = $request->type_user;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')->store('assets/images/profiles', 'custom');
        }
        if ($user->save()) {
            return redirect()->route('user.index')->with('success', 'User updated successfull.');
        } else {
            return redirect()->back()->with('error', 'Cannot update user. Try again!');
        }
    }

    public function addToCart(Request $request)
    {
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
        Alert::success('Product Added Success.', 'Check Your Cart Now!');
        return redirect()->back();
    }

    public function removeCart(Request $request, $id)
    {
        \Cart::remove($id);
        Alert::success('Product Deleted Success!');
        return redirect()->back();
    }
}
