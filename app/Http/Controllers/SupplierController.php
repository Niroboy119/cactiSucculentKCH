<?php

namespace App\Http\Controllers;
use App\Models\Supplier;

use Illuminate\Http\Request;


class SupplierController extends Controller
{
    public function display()
    {
        // $suppliers=Supplier::all();
        // foreach($suppliers as $supplier)
        // {
        //     echo $supplier->Supplier_Name;
        // }
        
        return view('manageSuppliers/addSupplier');
    }

    public function create(Request $request)
    {
        $supplier=new Supplier();
        $supplier->Supplier_Name=$request->name;
        $supplier->Supplier_Product=$request->product;
        $supplier->Supplier_PhoneNo=$request->phoneno;
        $supplier->Supplier_Email=$request->email;

        $supplier->save();
        return redirect('/');

    }


}
