<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Slideshow;

class SlideshowController extends Controller
{
    public function index(){
        $data['slideshows'] = DB::table('slideshows')->get();
        return view('admins.slideshows.index', $data);
    }

    public function create(){
        return view('admins.slideshows.create');
    }

    public function save(Request $request){
        $product = new Slideshow;
        $product->title = $request->title;
        $product->content = $request->content;
        if($request->hasFile('thumbnail')){
            $product->thumbnail = $request->file('thumbnail')->store('assets/images/slides', 'custom');
        }
        if($product->save()){
            return redirect()->route('slideshow.index')->with('success', 'Slide added successfull.');
        }else{
            return redirect()->route('slideshow.index')->with('error', 'Cannot add slide. Try again!');
        }
    }

    public function edit($id){
        $data['slideshow'] = Slideshow::find($id);
        return view('admins.slideshows.edit', $data);
    }

    public function update(Request $request){
        $slideshow = Slideshow::find($request->id);
        $slideshow->title = $request->title;
        $slideshow->status = $request->status;
        $slideshow->content = $request->content;
        if($request->hasFile('thumbnail')){
            $slideshow->thumbnail = $request->file('thumbnail')->store('assets/images/slides', 'custom');
        }
        if($slideshow->save()){
            return redirect()->route('slideshow.index')->with('success', 'Slide updated successfull.');
        }else{
            return redirect()->back()->with('error', 'Cannot update Slide. Try again!');
        }
    }

    public function delete($id){
        $slideshow = Slideshow::find($id);
        $slideshow->status = 0;

        if($slideshow->save()){
            return redirect()->back()->with('success', 'Slide deleted successfull.');
        }else{
            return redirect()->route('slideshow.index')->with('error', 'Cannot delete Slide. Try again!');
        } 
    }
}
