<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function displayProducts()
    {   
        return view('manageProducts/viewProducts');
    }

    public function displayaddProductForm()
    {
        return view('manageProducts/addProduct');
    }

    public function deleteProduct($id)
    {
        $product = Product::where([ 'Product_ID' => $id ])->delete();
        return redirect('/manageProducts');
    }

    public function editProduct($id)
    {
        return view('/manageProducts/editProduct',compact('id'));
    }


    public function create(Request $request)
    {
        $product=new Product();
        $product->Product_Name=$request->name;
        $product->Product_Quantity=$request->quantity;
        $product->Product_Type=$request->Type;
        $product->Product_Desc=$request->Desc;
        $product->Product_Price=$request->Price;
        $product->Product_Supplier=$request->Supplier;

        $product->save();
        return redirect('/manageProducts');

    }


    public function update(Request $request,$id)
    {
        $product = new Product();
        $product->Product_Name=$request->name;
        $product->Product_Quantity=$request->quantity;
        $product->Product_Type=$request->Type;
        $product->Product_Desc=$request->Desc;
        $product->Product_Price=$request->Price;
        $product->Product_Supplier=$request->Supplier;
        Product::where('Product_ID', $id)->update(array('Product_Name' => $request->name, 
        'Product_Quantity' => $request->quantity, 'Product_Type' => $request->Type, 'Product_Desc' => $request->Desc,
        'Product_Price' => $request->Price, 'Product_Supplier' => $request->Supplier));
       
        return redirect('/manageProducts');

    }


}
