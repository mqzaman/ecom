<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    //
    function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }
    function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }
    function search(Request $req)
    {
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }
    function addToCart(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('login');
        }
    }
    static function cartItem()
    {
        //if(Session::has('user')){
        $userid = Session::get('user')['id'];
        return Cart::where('user_id', $userid)->count();
        //}
        //return 0;
    }
    function cartList()
    {
        if (Session::has('user')) {
            $userid = Session::get('user')['id'];
        } else {
            $userid = 0;
        }
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userid)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        return view('cartlist', ['products' => $products]);
    }
    function removeCart($cart_id)
    {
        Cart::destroy($cart_id);
        return redirect('cartlist');
    }
    function orderNow()
    {
        if (Session::has('user')) {
            $userid = Session::get('user')['id'];
        } else {
            $userid = 0;
        }
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userid)
            ->select('products.*', 'cart.id as cart_id')
            ->sum('products.price');

        return view('ordernow', ['total' => $total]);
    }
    function orderPlace(Request $req){
        $userid = Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userid)->get();
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id=$cart->product_id;
            $order->user_id=$userid;
            $order->status="Pending";
            $order->payment_method=$req->payment;
            $order->payment_status="Pending";
            $order->address=$req->deliveryaddress;
            $order->save();
        }
        Cart::where('user_id',$userid)->delete();
        return redirect('/');
    }
    function myOrders(){
        
        if (Session::has('user')) {
            $userid = Session::get('user')['id'];
        } else {
            return redirect('login');
        }
        $my_orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userid)
            ->get();

        return view('myorders', ['orders' => $my_orders]);
    }
}
