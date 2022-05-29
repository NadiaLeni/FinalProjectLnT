<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    //
    public function createProduct(){
        return view('createProduct');
    }

    public function storeProduct(Request $request){
        $extension = $request->file('picture')->getClientOriginalExtension();
        $fileName = $request->name.'.'.$extension;
        $request->file('picture')->storeAs('public/image', $fileName);
        
        $request->validate([
            'name' => 'min:5|max:80',
            'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'picture' => $fileName
        ]);

        return redirect('/status');
    }

    public function showProducts(){
        $products = Product::all();
        return view('showProducts', compact('products'));
    }

    public function showProductById($id){
        $product = Product::findOrFail($id);
        return view('showProductById', compact('product'));
    }

    public function formUpdateProduct($id){
        $product = Product::findOrFail($id);
        return view('updateProduct', compact('product'));
    }

    public function updateProduct($id, Request $request){
        Product::findOrFail($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount
        ]);
        return redirect('/show/products');
    }

    public function deleteProduct($id){
        Product::destroy($id);
        return redirect('/show/products');
    }
}
