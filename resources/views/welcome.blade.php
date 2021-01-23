@extends('layout.app')

@section('title')
<title>Home Page</title>
@endsection

@section('content')
    <div class = "h-screen bg-white flex justify-center" >
        <div class = "w-8/12 bg-gray-100 p-6 text-4xl" >
            @auth
              <div>Hello,  {{Auth::user()->name}}</div>  
            <div>
                      
                @doctor
                    You are a Doctor
                @enddoctor

                @patient
                    You are a Patient
                @endpatient
               
            @else 
                Welcome
            @endauth
            </div>
          
        </div>
    </div>
@endsection