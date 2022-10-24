<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\StudentCard;


class CartController extends Controller
{
   public function addCart(Request $request, $id)
   {
        $product = Product::find($id);

        $user = Auth::user();

        $cart = new Cart();

        //GEBRUIKER

        $cart->name = $user->name;

        $cart->email = $user->email;

        $cart->user_id = $user->id;

        //PRODUCT

        $cart->quantity = $request->quantity;

        $cart->product_name = $product->name;

        $cart->price = $product->price * $request->quantity;

        $cart->product_id = $product->id;


        $cart->save();

       
        return redirect()->back();
   }

   public function showCart()
   {

    //zoek voor ingelogde gebruiker id 
    $id = Auth::user()->id;

    $user = Auth::user();

    $cart = Cart::where('user_id', '=' , $id)->get();
    

    return view('faplab.cart',['user' => $user], compact('cart'));


   }

    public function removeCart($id){

    $cart = Cart::findOrFail($id);

    $cart->delete();

    return redirect('/cart')->with('deletedItem', 'Item succesfully removed from cart');

    }

    public function order(){
     
     $user = Auth::user();

     $userId = $user->id;

     $student = StudentCard::find($userId);

     $data = Cart::where('user_id', '=', $userId)->get();

     

          foreach ($data as $data) {

               if($student->amount > $data->price)
               {
               $order = new Order;

               $order->user_id = $data->user_id;

               $order->user_name = $data->name;

               $order->user_email = $data->email;

               $order->product_name = $data->product_name;

               $order->quantity = $data->quantity;

               $order->price = $data->price;

               $order->product_id = $data->product_id;


               $order->save();

               $cart_id = $data->id;

               $cart = Cart::find($cart_id);

               $student->amount = $student->amount - $data->price;

               $student->update();

               $cart->delete();
               } 
                else {
                    return view('faplab.recharge', ['student' => $student])->with('fund', 'Low on fund please top up');   
                }
          }

      return redirect()->back()->with('order', 'Thank you for your order');  
     

    }


}
