<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Models\contact;

class UserController extends Controller
{
    //
    public function allusers()
    {$users=User::get();
    return view('admin.users',compact('users'));}

    public function create()
    {return view ('admin.addUser');}


    public function store(Request $request):RedirectResponse
    {
    $user= new user();
    $user->name=$request->name;
    $user->user_name=$request->user;
    $user->email=$request->email;
    $user->active=$request->active;
    $user->password=$request->password;
    
    
    $user->SAVE();
    return redirect('users');

}
public function edit(string $id)
{ $user=user::findOrfail($id);
return view('admin.edituser',compact('user'));}

public function update(Request $request,string $id):RedirectResponse
{$users= user::findOrfail($id);
 $users->name=$request->name;
 $users->user_name=$request->user;
 $users->email=$request->email;
 $users->active=$request->active;
$users->password=$request->password;
 $users->SAVE();
     return redirect('users');

}
}



