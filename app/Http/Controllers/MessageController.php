<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\contactUsMail;
use Illuminate\Http\RedirectResponse;
class MessageController extends Controller
{public function allmessages()
    {$messages=Message::get();
    return view('admin.messages',compact('messages'));}

    public function creat(){
        return view ('contact');
    }
    public function sendmessage(Request $request){
        $newcontact=new Message();
        $newcontact->first_name=$request->name;
        $newcontact->last_name=$request->user_name;
        $newcontact->email=$request->email;
        $newcontact->message=$request->message;
        $newcontact->SAVE();
        return  "send successfully";
    }
    public function sendmail(){
    $msg = Message::find(5);
    Mail::To('admin@yahoo.com')->send(new ContactUsMail($msg));
    return ('email send');
    }
    public function destroy(Request $request):RedirectResponse{
        $id=$request->id;
        $message=Message::findOrFail($id);
        $message->delete();
            return redirect('messages');
        
    }
    public function show(string $id){
        $message=Message::findOrFail($id);
        return view('admin.showMessage',compact('message'));
    }
}
    //

