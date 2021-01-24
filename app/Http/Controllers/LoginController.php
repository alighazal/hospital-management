<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite ;



class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index () {

       // dd(request());

        return view('Auth.login');
    }

    public function github() {

        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        
        $user = Socialite::driver('github')->user();
        //dd($user);

        $domain = explode('@', $user->email);

        //dump($domain[1]);

        if($domain[1] == "gmail.com"){
            return redirect('/login')->with('domain', 'this domain is not authorized');
        }

        $user = User::firstOrCreate([
            "email" => $user->email
        ], [
            "email" => $user->email,
            "name" => $user->name,
            "password" => Hash::make(Str::random(24)),
            "role" => User::UserRole['Other']
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function google() {

        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        
        $user = Socialite::driver('google')->user();
        //dd($user);

        $domain = explode('@', $user->email);

        //dump($domain[1]);

        if($domain[1] != "aucegypt.edu"){
            return redirect('/login')->with('domain', 'this domain is not authorized');
        }

        $user = User::firstOrCreate([
            "email" => $user->email
        ], [
            "email" => $user->email,
            "name" => $user->name,
            "password" => Hash::make(Str::random(24)),
            "role" => User::UserRole['Other']
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function store (Request $request) {

        $this->validate($request, [
            "email" => "required|email",
            "password" => "required"
        ]);

        

        if (!Auth::attempt($request->only('email', 'password'), $request->remember) ){
            return back()->with('status', 'invalid credintials');
        } 

        return redirect(route('home'));
    }



}
