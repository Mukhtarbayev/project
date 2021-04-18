<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        if(Auth::check()){
            $elements = DB::select('select * from cart where user_id = ?', [Auth::user()->id]);
        } else{
            $elements = DB::select('select * from cart where user_id = ?', [99]);
        }
        return view('types', ['products' => $products, 'cart' => $elements]);
    }
}
