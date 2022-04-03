<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function create(Request $request){
        
        DB::table('users')->insert(['user_type' => 'admin', 'name' => $request->fullname, 'email' => $request->email, 'password' => Hash::make($request->password)]);
        return Redirect::back()->with('error_code', 5);
    }

    public function getAllAdmins(){
        $admin = User::where(["user_type" => "admin"])->get();
        return view('manageAdmin', compact("admin"));
    }
}
