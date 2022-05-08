<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Product;

use Illuminate\Http\Request;


class SupplierController extends Controller
{
    public function displaySuppliers()
    {   
        return view('manageSuppliers/viewSuppliers');
    }


    public function displayaddSupplierForm()
    {
        return view('manageSuppliers/addSupplier');
    }
    
    public function displayaddSupplierFromProduct($status)
    {
        return view('manageSuppliers/addSupplier',compact('status'));
    }

    public function deleteSupplier($id)
    {
        $supplier = Supplier::where([ 'Supplier_ID' => $id ]);
        $products=  Product::where([ 'Product_Supplier' => $supplier->value('Supplier_Name') ])->delete();
        $supplier=$supplier->delete();
        return redirect('/manageSuppliers');
    }

    public function searchSuppliers($search)
    {   
        $supplier = Supplier::where ( 'Supplier_Name', 'LIKE', $search . '%' )->get ();
        return view('manageSuppliers/searchSuppliers',compact('supplier','search'));
    }

    public function editSupplier($id)
    {
        return view('/manageSuppliers/editSupplier',compact('id'));
    }

    public function create(Request $request,$status)
    {
        if($request->img_Text=="1")
        {
            $supplier=new Supplier();
            $supplier->Supplier_Name=$request->name;
            $supplier->Supplier_PhoneNo=$request->phoneno;
            $supplier->Supplier_Email=$request->email;
            $supplier->Supplier_Address=$request->Address;
            $request->file->store('images/suppliers', 'public');
            $supplier->Supplier_Image=$request->file->hashName();
        }
        else
        {
            $supplier=new Supplier();
            $supplier->Supplier_Name=$request->name;
            $supplier->Supplier_PhoneNo=$request->phoneno;
            $supplier->Supplier_Email=$request->email;
            $supplier->Supplier_Address=$request->Address;
            $supplier->Supplier_Image="defaultSupplier.jpg";   
        }

        $supplier->save();

        $link="";
        if($status=="default")
        {
            $link="/manageSuppliers";
        }else if($status=="addProductForm"){
            $link="/".$status;
        }else{
            $link="/"."editProduct/".$status;
        }

        return redirect($link);

    }

    public function update(Request $request,$id)
    {
        if($request->img_Text=="1")
        {
            $request->file->store('images/suppliers', 'public');
            Supplier::where('Supplier_ID', $id)->update(array('Supplier_Name' => $request->name, 
            'Supplier_Address' => $request->Address, 'Supplier_Email' => $request->email, 'Supplier_PhoneNo' => $request->phoneno,
            'Supplier_Image' => $request->file->hashName() ));
        }
        else
        {
            Supplier::where('Supplier_ID', $id)->update(array('Supplier_Name' => $request->name, 
            'Supplier_Address' => $request->Address, 'Supplier_Email' => $request->email, 'Supplier_PhoneNo' => $request->phoneno));
        }

        
        return redirect('/manageSuppliers');
    }


}
