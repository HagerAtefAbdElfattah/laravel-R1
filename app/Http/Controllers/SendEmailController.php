<?php

namespace App\Http\Controllers;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    public function display(){
        return view('contactUs');
    }

    public function send(Request $request){
        
        $data =[
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'content'=>$request->content,
        ];
        Mail::to('hager@example.com')->send(new DemoMail($data));
        return 'Done';
    }
}
