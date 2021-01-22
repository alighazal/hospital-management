@section('title')
<title>Register</title>
@endsection

@extends('layout.app')

@section('content')
    
    <div class = "flex justify-center" >

        <div class = "w-4/12 bg-white p-6 rounded-lg" >
            <div class = " flex mb-4 font-bold text-xl justify-center "> Register</div>

            <form action="/register"  method = "post" >
                @csrf 
                <div class = "mb-4">
                    <label for="Name" class= "sr-only" > Name</label>
                    <input type="text" name  = "name" id = "name" placeholder="Your name here" 
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror " 
                    value = "{{ old ('name')}}">

                    @error ('name')
                        <div class = "text-red-500 mt-2 text-small">
                            {{ $message}}
                        </div>
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for="username" class= "sr-only" > Username</label>
                    <input type="text" name  = "username" id = "username" placeholder="Your Username here" 
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg  @error('username') border-red-500 @enderror " 
                    value = "{{ old ('username')}}" >

                    @error ('username')
                        <div class = "text-red-500 mt-2 text-small">
                            {{ $message}}
                        </div>
                    @enderror

                </div>

                <div class = "mb-4">
                    <label for="email" class= "sr-only" > Email</label>
                    <input type="text" name  = "email" id = "email" placeholder="Your Email here" 
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg  @error('email') border-red-500 @enderror "
                    value = "{{ old ('email')}}">

                    @error ('email')
                        <div class = "text-red-500 mt-2 text-small">
                            {{ $message}}
                        </div>
                    @enderror

                </div>

                <div class = "mb-4">
                    <label for="password" class= "sr-only" > Password</label>
                    <input type="password" name  = "password" id = "password" placeholder="Your Password here" 
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg  @error('password') border-red-500 @enderror "
                    value = "">

                    @error ('password')
                        <div class = "text-red-500 mt-2 text-small">
                            {{ $message}}
                        </div>
                    @enderror

                </div>

                <div class = "mb-4">
                    <label for="password_confirmation" class= "sr-only" > Password Confirmation</label>
                    <input type="password" name  = "password_confirmation" id = "password_confirmation" placeholder="Confirm Password" 
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value = "">
                </div>

                <div class = "mb-4 flex-column justify-center">
        
                    <select
                        class = "p-2 rounded" 
                        name="role" id="role" value = "{{ old ('role')}}">
                        
                        <option value="" selected disabled hidden>Choose here</option>
                        <option value="{{App\Models\User::UserRole['Patient']}}">Patient</option>
                        <option value="{{App\Models\User::UserRole['Doctor']}}">Doctor</option>
                        <option value="{{App\Models\User::UserRole['HospitalAdmin']}}">Hospital Admin</option>
                    </select>

                    @error ('role')
                        <div class = "text-red-500 mt-2 text-small">
                            {{ $message}}
                        </div>
                    @enderror
                </div>

                <div class = "flex justify-center">
                    
                    <button type = "submit" class = "bg-blue-500 text-white px-4 py-5 
                    rounded font-medium ">
                    Submit</button>

                </div>


            </form>

           

        </div>
    </div>

@endsection
