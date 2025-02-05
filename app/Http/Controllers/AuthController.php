<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function create_user(Request $request)
    {

        request()->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
       
        $save = new User;

        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(40);
        $save->save();

        Mail::to($save->email)->send(new RegisterMail($save));

        return redirect('login')->with('success', "Your account register successfully and verify your email address");
    }

    public function verify($token){
        $user = User::where('remember_token', '=', $token)->first();

        if(!empty($user)){
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();

            return redirect('login')->with('success', 'Your account succesfully verified');
        }
        else{
            abort(404);
        }
    }

}
