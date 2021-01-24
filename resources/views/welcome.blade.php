@extends('layout.app')

@section('title')
<title>Home Page</title>
@endsection

@section('content')
    <div class = "h-screen bg-white flex justify-center" >
        <div class = " felx w-8/12 bg-gray-100 p-6 justify-center " >
            @auth
                <div class = "text-4xl">Hello,  {{Auth::user()->name}}</div>  
                <div class = "text-4xl">
                        
                    @doctor
                        You are a Doctor
                    @enddoctor

                    @patient
                        You are a Patient
                    @endpatient

                    @hospital_admin
                        You are a Hospital Admin
                    @endhospital_admin
                </div>
                
                @else 
                <div class = "text-4xl"> Welcome </div>
                @endauth

                @auth
                
                @hospital_admin
                <form method = "get" action = "hospital/create">
                    <div class = " flex justify-center">
                        <button type = "submit" class = "bg-red-500 text-white px-2 py-2 
                        rounded-lg font-medium w-3/12 mt-6"> Add Hospital </button>
                    </div>
                </form>
                @endhospital_admin
                @endauth
          
        </div>
    </div>
@endsection