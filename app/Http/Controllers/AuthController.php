<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerificationMail;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }else{
            return back()->with('message',['type' => 'fail','content' => 'Incorrect Email or Password.']);
        }
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $validtoken = Str::random(20);

        Token::create([
            'token' => $validtoken,
            'email' => $request->email,
        ]);

        $user_email = $request->email;
        $user_name = $request->name;

        Mail::to($user_email)->send(new VerificationMail($user_email,$user_name,$validtoken));

        return redirect()->route('login')->with('message',['type'=>'success','content'=>'Your account is registered successfully. Please verify your email address.']);
    }

    public function UserVerification($token)
    {
        $get_token = Token::where('token',$token)->first();
        if($get_token){
            $get_token->is_verified = 1;
            $get_token->save();

            $user = User::where('email',$get_token->email)->first();
            $user->is_verified = 1;
            $user->save();

            $get_token->delete();
            return redirect()->route('login')->with('message',['type' => 'success','content' => 'Email verification is success. Please login with your email and password.']);
        }else{
            return redirect()->route('login')->with('message',['type' => 'fail','content' => 'Your email is already verified. Please login with your email and password.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
