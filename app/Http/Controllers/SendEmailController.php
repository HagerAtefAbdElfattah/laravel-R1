<?php

namespace App\Http\Controllers;
use App\Mail\DemoMail;
use App\Jobs\DemoMailJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    public function create(){
        return view('contactUs');
    }

    public function send(Request $request){
        
        $data =[
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'content'=>$request->content,
        ];
          dispatch(new DemoMailJob($data)) ;
           return view('contactUsReplay');
    }
}
