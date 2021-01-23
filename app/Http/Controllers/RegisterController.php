<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;

class RegisterController extends Controller
{

    public function __construct()
    {
       $this->middleware(['guest']);
    }

    public function index () {

        return view("Auth.register");
    }

    public function store (Request $request) {

        
        
        $this->validate($request, [
            "name"      => "required|max:255",
            "email"     => "required|max:255|email",
            "username"  => "required|max:255",
            "password"  => "required|confirmed",
            "role" => ValidationRule::in(User::UserRole),
        ]);

        $user = User::create([
            "name"      =>  $request->name,
            "email"     =>  $request->email,
            "username"  =>  $request->username,
            "password"  =>  Hash::make($request->password),
            "role"      =>  $request->role   
        ]);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        
        if ($user->role == User::UserRole['Patient']){
            Patient::create([
                "user_id" => $user->id,
                "name" => $user->name
            ]);
        } else if ($user->role == User::UserRole['Doctor']){

            //dd($user);
            Doctor::create([
                "user_id" => $user->id,
                "name" => $user->name
            ]);
            return redirect('/doctor/create');
        } else if (($user->role == User::UserRole['HospitalAdmin'])){
            // TODO
        }

     
        return back();    

    }

}
