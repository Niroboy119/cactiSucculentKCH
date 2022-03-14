<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUser(Request $request, $id)
    {
    if($id!=null){
    User::where('id',$id)->update(array('name'=>$request->name,'email'=>$request->email,'cust_phone_number'=>$request->cust_phone_number,
    'cust_address'=>$request->cust_address,));
    
    }
    return redirect('/userProfile');
    }

    public function updateUserProfile(Request $request, $id)
    {
        if($id!=null){
            $request->file->store('images/profilepic', 'public');
        }
        return redirect('/userProfile');
    }

    public function resetEmailPassword(Request $request, $id)
    {
        if($id!=null){
            User::where('id',$id)->update(array('email'=>$request->email,'password'=>$request->password,));
            }
            return redirect('/userProfile');
    }
}