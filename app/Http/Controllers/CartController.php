<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function index(){
        $cart = Cart::all();
        $products = Product::all();
        if(Auth::check()){
            $elements = DB::select('select * from cart where user_id = ?', [Auth::user()->id]);
        } else{
            $elements = DB::select('select * from cart where user_id = ?', [99]);
        }
        $totalElements=0;
        $price=0;
        foreach($elements as $element){
            $price+=$products[$element->cart_id-1]->price*$element->amount;
            $totalElements+=$element->amount;
        }
        return view('cart', ['cart' => $elements, 'products' => $products, 'elements'=>$totalElements, 'totalPrice'=>$price]);
    }

    public function addToCart($id){
        $product = Product::find($id);
        if(Auth::check()){
            if(DB::table('cart')->where('cart_id', '=', $product->id)->where('user_id','=',Auth::user()->id)->exists()){
                $element = DB::table('cart')->where('cart_id', '=', $product->id)->where('user_id','=',Auth::user()->id);
                $element->increment('amount');
                // DB::update('update cart set amount = ? where id= ?', []);
            } else{
                DB::insert('insert into cart (user_id, cart_id,amount) values (?, ?, ?)', [Auth::user()->id, $id, 1]);
            }
        } else{
            if(DB::table('cart')->where('cart_id', '=', $product->id)->where('user_id','=',99)->exists()){
                $element = DB::table('cart')->where('cart_id', '=', $product->id)->where('user_id','=',99);
                $element->increment('amount');
            } else{
                DB::insert('insert into cart (user_id, cart_id,amount) values (?, ?, ?)', [99, $id, 1]);
            }
        }
        return redirect()->back()->with('addToCart','.');
    }

    public function removeFromCart($id){
        $product = Product::find($id);
        if(Auth::check()){ 
            DB::delete('delete from cart where user_id=? && cart_id=?', [Auth::user()->id, $id]);
        } else{
            DB::delete('delete from cart where user_id=99 && cart_id=?', [$id]);
        }
        return redirect()->back()->with('removeFromCart','.');
    }
}
