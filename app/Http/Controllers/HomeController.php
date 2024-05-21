<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['totalProduct'] = DB::table('products')
        ->where('status', 1)
        ->count();
        $data['totalCategories'] = DB::table('categories')
        ->where('active', 1)
        ->count();
        $data['totalUsers'] = DB::table('users')
        ->where('active', 1)
        ->count();
        $data['totalInvoice'] = DB::table('invoices')
        ->where('status', 1)
        ->count();
        $data['totalAmount'] = DB::table('invoices')->get()->sum('total_amount');
        return view('home', $data);
    }

}
