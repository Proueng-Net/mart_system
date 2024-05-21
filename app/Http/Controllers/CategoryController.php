<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    public function index(){
        $data['categories'] = DB::table('categories')->get();
        return view('admins.categories.index', $data);
    }
    public function active(){
        $data['categories'] = DB::table('categories')->where('active', "1")->get();
        return view('admins.categories.index', $data);
    }
    public function deleted(){
        $data['categories'] = DB::table('categories')->where('active', "0")->get();
        return view('admins.categories.index', $data);
    }

    public function create(){
        return view('admins.categories.create');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->active = 0;

        if($category->save()){
            return redirect()->back()->with('success', 'Category deleted successfull.');
        }else{
            return redirect()->route('categories.index')->with('error', 'Cannot delete Category. Try again!');
        } 
    }

    public function update(Request $request){
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->active = $request->active;
        if($request->hasFile('photo')){
            $category->photo = $request->file('photo')->store('assets/images/categories', 'custom');
        }
        if($category->save()){
            return redirect()->route('category.index')->with('success', 'Category updated successfull.');
        }else{
            return redirect()->back()->with('error', 'Cannot update Category. Try again!');
        }
    }

    public function edit($id){
        $data['category'] = Category::find($id);
        return view('admins.categories.edit', $data);
    }

    public function save(Request $request){
        $category = new Category;
        $category->name = $request->name;
        if($request->hasFile('photo')){
            $category->photo = $request->file('photo')->store('assets/images/categories', 'custom');
        }
        if($category->save()){
            return redirect()->route('category.index')->with('success', 'Category created successfull.');
        }else{
            return redirect()->route('category.index')->with('error', 'Cannot create Category. Try again!');
        }
    }
}
