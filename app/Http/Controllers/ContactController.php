<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\contact;

class ContactController extends Controller
{
    //

    public function create(){
    return view ('contact');
}
public function store(Request $request){
    $new_can= new contact();
    $new_can->$user->name=$request->name;
    $new_can->$user->user_name=$request->user_name;
    $new_can->$user->email=$request->email;
    $new_can->message=$request->message;
   $new_can->SAVE();
    return  "send successfully";
}
}
