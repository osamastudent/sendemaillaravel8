<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Register(){
    return view('myusers.register');
    }

    public function RegisterStore(Request $request){
        $users=$request->all();
        $users['status']="status";
        $users['password']=Hash::make($request->password);
        
        User::create($users);

                Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        event(new Registered($users));
        return redirect('/');
        }

        
        // login

    public function Login(){
        return view('myusers.login');
        }


        public function LoginStore(Request $request){
             $credentials = $request->only('email', 'password');
             $remember=$request->remember;
        $user=User::where('email',$credentials['email'])->first();
        if(Auth::attempt($credentials,$remember)){
        return redirect('/');
        }
        if($user){
            return redirect('login')->with('status','Password is Not match');
        }
        else{
            return redirect('login')->with('status','The Email is Not Regisred');
        }


        return redirect('login')->with('status','there is some error');
            }

}
