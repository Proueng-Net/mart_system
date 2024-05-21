<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function index(){
        $data['users'] = DB::table('users')
        ->orderBy('users.created_at', 'DESC')
        ->paginate(8);
        return view('admins.users.index', $data);
    }
    public function active(){
        $data['users'] = DB::table('users')->where('active', "1")
        ->orderBy('users.created_at', 'DESC')
        ->paginate(8);
        return view('admins.users.index', $data);
    }
    public function deleted(){
        $data['users'] = DB::table('users')->where('active', "0")
        ->orderBy('users.created_at', 'DESC')
        ->paginate(8);
        return view('admins.users.index', $data);
    }

    public function create(){
        $data['users'] = DB::table('users')->get();
        return view('admins.users.create', $data);
    }

    public function delete($id){
        $user = User::find($id);
        $user->active = 0;

        if($user->save()){
            return redirect()->back()->with('success', 'User deleted successfull.');
        }else{
            return redirect()->route('user.index')->with('error', 'Cannot delete user. Try again!');
        } 
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->active = $request->active;
        $user->type_id = $request->type_user;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        if($request->hasFile('photo')){
            $user->photo = $request->file('photo')->store('assets/images/profiles', 'custom');
        }
        if($user->save()){
            return redirect()->route('user.index')->with('success', 'User updated successfull.');
        }else{
            return redirect()->back()->with('error', 'Cannot update user. Try again!');
        }
    }

    public function edit($id){
        $data['user'] = User::find($id);
        return view('admins.users.edit', $data);
    }

    public function save(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($request->hasFile('photo')){
            $user->photo = $request->file('photo')->store('assets/images/profiles', 'custom');
        }
        if($user->save()){
            return redirect()->route('user.index')->with('success', 'User created successfull.');
        }else{
            return redirect()->route('user.index')->with('error', 'Cannot create user. Try again!');
        }
    }
}
