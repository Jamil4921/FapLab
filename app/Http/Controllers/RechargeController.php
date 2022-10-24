<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\StudentCard;
use Session;
use Stripe;

class RechargeController extends Controller
{

   public function rechargePage(Request $request, $id){

    $student = StudentCard::findOrFail($id);


    return view('faplab.recharge', ['student' => $student]);

   }

   public function addAmount(Request $request, $id){

      $student = StudentCard::findOrFail($id);

      $student->amount = $student->amount + $request->amount;

      $student->update();
  
  
      return view('faplab.recharge', ['student' => $student])->with('updaterecharge', 'Balance succesfully added');
  
     }



  







   
   


}
