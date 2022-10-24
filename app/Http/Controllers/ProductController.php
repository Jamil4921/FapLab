<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StudentCard;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();

        return view('faplab.product', 
        ['product' => $product]);
    }

    public function adminProduct(){

        $product = Product::all();


        return view('faplab.admin.product', ['product' => $product]);
    }

    public function showId($id){

        $product = Product::findOrFail($id);

        return view('faplab.admin.details', ['product' => $product]);
    }

    public function create(){
        
        return view('faplab.admin.create');
    }

    public function store(){

        $product = new Product();

        $product->name = request('name');

        $product->price = request('price');

        $product->details = request('details');

        $product->save();


        return redirect('/admin/product')->with('msg', 'Product succesfully created');
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/product')->with('deleted', 'Product succesfully deleted');
    }

    public function editProduct(Request $request, $id){

        $product = Product::findOrFail($id);

        return view('faplab.admin.productedit')->with('product', $product);
    }

    public function editProductUpdate(Request $request, $id){

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->details = $request->input('details');
        $product->update();

        return redirect('/admin/product')->with('updateProduct', 'Product has been updated');
    }

    
}
