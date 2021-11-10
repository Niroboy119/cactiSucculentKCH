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
        $request->file->store('images/products', 'public');
        $product->Product_Image=$request->file->hashName();

        $product->save();
        return redirect('/manageProducts');

    }


    public function update(Request $request,$id)
    {
        $request->file->store('images/products', 'public');
        
        Product::where('Product_ID', $id)->update(array('Product_Name' => $request->name, 
        'Product_Quantity' => $request->quantity, 'Product_Type' => $request->Type, 'Product_Desc' => $request->Desc,
        'Product_Price' => $request->Price, 'Product_Supplier' => $request->Supplier, 'Product_Image' => $request->file->hashName() ));
       
        return redirect('/manageProducts');

    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "Product_Name" => $product->Product_Name,
                        "Product_Quantity" => 1,
                        "Product_Type" => $product->Product_Type,
                        "Product_Desc" => $product->Product_Desc,
                        "Product_Price" => $product->Product_Price,
                        "Product_Supplier" => $product->Product_Supplier,
                        "Product_Image" => $product->Product_Image
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['Product_Quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
                    "Product_Name" => $product->Product_Name,
                    "Product_Quantity" => 1,
                    "Product_Type" => $product->Product_Type,
                    "Product_Desc" => $product->Product_Desc,
                    "Product_Price" => $product->Product_Price,
                    "Product_Supplier" => $product->Product_Supplier,
                    "Product_Image" => $product->Product_Image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function index()
    {
         $products = Product::all();

         return view('products', compact('products'));
     }

     public function cart()
     {
         return view('cart');
     }

    // public function addToCart($id)
    // {
    //     $product = Product::find($Product_ID);

    //     if(!$product) {

    //         abort(404);
    //     }

    //     $cart = session()->get('cart');

    //     //if cart is empty then this the first product
    //     if(!$cart) {

    //         $cart = [

    //             $Product_ID => [
    //                 "Name" => $product->Product_Name,
    //                 "Description: " => $product->Product_Desc,
    //                 "quantity" => 1,
    //                 "price" => $product->Product_Price,
    //                 "photo" => $product->Product_Supplier,
    //             ]
    //         ];

    //     session()->put('cart', $cart);

    //     return redirect()->back()->width('success', 'Product added to cart successfully!');
    //     }

    //     // if cart not empty then check if this product exist then increment quantity
    //     if(isset($cart[$Product_ID])) {
    //         $cart[$Product_ID]['quantity']++;

    //         session()->put('cart', $cart);

    //         return redirect()->back()->with('success', 'Product added to cart successfully!');
    //     }

    //     // if item not exist in cart then add to cart with quantity = 1
    //     $cart[$Product_ID] = [
    //         "Name" => $product->Product_Name,
    //         "Description: " => $product->Product_Desc,
    //         "quantity" => 1,
    //         "price" => $product->Product_Price,
    //         "photo" => $product->Product_Supplier,
    //     ];

    //     session()->put('cart', $cart);

    //     return redirect()->back()->with('success', 'Product added to cart successfully!');
    // }

    public function increaseQuantity($id)
    {
        $product=Product::where('Product_ID', $id);
        $quantity=$product->value('Product_Quantity')+1;
        Product::where('Product_ID', $id)->update(array('Product_Quantity' => $quantity));
       
        return redirect('/manageProducts');

    }

    public function decreaseQuantity($id)
    {
        $product=Product::where('Product_ID', $id);
        $quantity=$product->value('Product_Quantity')-1;
        Product::where('Product_ID', $id)->update(array('Product_Quantity' => $quantity));
       
        return redirect('/manageProducts');

    }

    public function searchProducts($search)
    {   
        $product = Product::where ( 'Product_Name', 'LIKE', '%' . $search . '%' )->get ();
        return view('manageProducts/searchProducts',compact('product'));
    }

    public function search($search)
    {   
        $product = Product::where ( 'Product_Name', 'LIKE', '%' . $search . '%' )->get ();
        return view('search',compact('product'));
    }
    

}
