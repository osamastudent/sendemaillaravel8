<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WelcomNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{

    public function Notification()
    {
        return view('notification');
    }


    public function SendNotification(Request $request)
    {
        $users=User::all();
        $files = $request->file('myfiles');
        $originalNames = [];
    
        foreach ($files as $file) {
            $originalNames[] = $file->getClientOriginalName();
            $file->storeAs('public', $file->getClientOriginalName());
        }

        $notificationData = [
            'url' => $request->url,
            'subject'=>$request->subject,
            'body'=>$request->body,
            'myfiles'=>$originalNames,
        ];
        // dd($notificationData);

        Notification::send($users,new WelcomNotification($notificationData));
        
        return "Notification Has Sent";
    }
}
