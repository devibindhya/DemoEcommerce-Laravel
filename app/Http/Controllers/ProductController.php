<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{ 
    public function index()
    {
       //fetch all the products and details from the database
        $data= Product::all();
        return view('product',['products'=>$data]);
    }
    /* When click the image it will show all the details of the image in a new page by passing id of the product */
    public function detail($id)
    {
       //select * from products where id= $id
        $data= Product::find($id);
        return view('detail',['product'=>$data]);
    }
    /* Searching an item in the search bar */
    public function search(Request $req)
    {
        //return $req->input();
        $data=Product::
        where('name','like','%' .$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
     } 
     /* Adding a product to cart with userid and product id */
     public function addToCart(Request $req)
     {
         if($req->session()->has('user'))
         {
            $cart=new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');
         }
         else
         {
            return redirect('/login');
         }
     }
     /*Public function  throws error.....
     Count of the Items inside the cart of the particular user shows in header */
     static function cartItem()
     {
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
     }
     public function cartList()
     {  
        $userId=Session::get('user')['id'];
        $products=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view ('cartlist', ['products'=>$products]);
     }
     /*Delete product from the cart */
     public function removeCart($id)
     {
         Cart::destroy($id);
         return redirect('cartlist');
     }
     public function orderNow()
     {
        $userId=Session::get('user')['id'];
        $total=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');
        return view ('ordernow', ['total'=>$total]);
     }
     /* Creating order table with the product and removing it from cart table */
     public function orderPlace(Request $req)
     {
      //return $req->input();
      $userId=Session::get('user')['id'];
      $allCart=Cart::where('user_id',$userId)->get();
      foreach($allCart as $cart)
      {
         $order=new Order;
         $order->product_id=$cart['product_id'];
         $order->user_id=$cart['user_id'];
         $order->status="Pending";
         $order->payment_method=$req->payment;
         $order->payment_status="Pending";
         $order->address=$req->address;
         $order->save();
         //deleting content from Cart when a order is placed
         Cart::where('user_id',$userId)->delete();

      }
         $req->input();
         return redirect('/');
     }
      /* Fetching all the orders of the user by joining order table and product table  */
      public function myOrders()
      {
         $userId=Session::get('user')['id'];
         $orders=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();
        return view ('myorders', ['orders'=>$orders]);
      }
}
