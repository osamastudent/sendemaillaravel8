<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    
    public function sendEmail(){
        return view('orders.sendemail');
    }
    
    public function sendEmailToUser(Request $request){
        // $details = [
        //     'title' => 'laravel8 Mail',
        //     'body' => 'This is for testing email using smtp',
        //     'image'=>$request->image,
        // ];

        
       
        Mail::to($request->email)->send(new OrderShipped($request));
       
        return "Email is Sent.";
    }
}
