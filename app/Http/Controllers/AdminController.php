<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\StudentCard;
use App\Models\Order;

class AdminController extends Controller
{
    public function adminHome(){

        $user = User::all();

        return view('faplab.admin.index', ['user' => $user]);
    }

    public function showUserId($id){

        $user = User::findOrFail($id);

        $order = Order::where('user_id', '=' , $user->id)->get();


        return view('faplab.admin.user', ['user' => $user],compact('order'));
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin/home')->with('deletedUser', 'User has been succesfully deleted');
    }

    public function editUser(Request $request, $id){

        $user = User::findOrFail($id);

        return view('faplab.admin.useredit')->with('user', $user);
    }

    public function editUserUpdate(Request $request, $id){

        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->update();

        return redirect('/admin/home')->with('update', 'user succesfully added as admin');
    }

    public function showOrder(){

        $order = Order::orderBy('user_id')->get();
        return view('faplab.admin.order', ['order' => $order]);
    }

    
    
}
