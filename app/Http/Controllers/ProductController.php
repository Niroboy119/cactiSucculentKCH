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


}
