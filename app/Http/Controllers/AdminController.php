<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
class AdminController extends Controller
{
    //
    public function create()
    {return view ('addadmin');}


    public function store(Request $request):RedirectResponse
    {
    $admin= new admin();
    $admin->fullName=$request->name;
    $admin->user_name=$request->user;
    $admin->email=$request->email;
    
    $admin->password=$request->password;
    
    
    $admin->SAVE();
    return "add";

}

}
