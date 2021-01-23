@extends('layout.app')

@section('title')
<title>Doctors Profile</title>
@endsection


@section('content')

<div class = "flex justify-center" >
<div class = "w-4/12 bg-white p-6 rounded-lg " >
    <div class = " flex mb-4 font-bold text-xl justify-center "> Doctor Profile</div>

    <form method = "post" action = "/doctor/{{$doctor->user_id}}" >
        @csrf 
        @method('patch')
        <div class = "mb-4">
            <label for="Name" class= "sr-only" > Name</label>
            <input type="text" name  = "name" id = "name" placeholder="Your name here" 
            class = "bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror " 
            value = "{{ $doctor->name }}" disabled>

            @error ('name')
                <div class = "text-red-500 mt-2 text-small">
                    {{ $message}}
                </div>
            @enderror
        </div>


        <div class = "mb-4">
            <label for="dob"  > Date of Birth</label>
            <input type="date" name  = "dob" id = "dob" placeholder="dob" 
            class = " mt-2 bg-gray-100 border-2 w-full p-4 rounded-lg  @error('dob') border-red-500 @enderror " 
            value = "{{ old ('dob')}}" >

            @error ('dob')
                <div class = "text-red-500 mt-2 text-small">
                    {{ $message}}
                </div>
            @enderror

        </div>

        <div class = "mb-4">
            <label for="speciality" class= "sr-only" > Name</label>
            <input type="text" name  = "speciality" id = "speciality" placeholder="Your speciality" 
            class = "bg-gray-100 border-2 w-full p-4 rounded-lg @error('speciality') border-red-500 @enderror " 
            value = "{{ old ('speciality')}}">

            @error ('speciality')
                <div class = "text-red-500 mt-2 text-small">
                    {{ $message}}
                </div>
            @enderror
        </div>

        <div class = "mb-4">
            <label for="alma_mater" class= "sr-only" > Alma Mater</label>
            <input type="text" name  = "alma_mater" id = "alma_mater" placeholder="Your Alma Mater" 
            class = "bg-gray-100 border-2 w-full p-4 rounded-lg @error('alma_mater') border-red-500 @enderror " 
            value = "{{ old ('alma_mater')}}">

            @error ('alma_mater')
                <div class = "text-red-500 mt-2 text-small">
                    {{ $message}}
                </div>
            @enderror
        </div>


        <div class = "mb-4">
            <label for="graduation_date"  > Graduation Date</label>
            <input type="date" name  = "graduation_date" id = "graduation_date" placeholder="Graduation Date" 
            class = " mt-2 bg-gray-100 border-2 w-full p-4 rounded-lg  @error('graduation_date') border-red-500 @enderror " 
            value = "{{ old ('graduation_date')}}" >

            @error ('graduation_date')
                <div class = "text-red-500 mt-2 text-small">
                    {{ $message}}
                </div>
            @enderror

        </div>

           
        <div class = "flex justify-center">
            <button type = "submit" class = "bg-blue-500 text-white px-4 py-5 
            rounded font-medium ">Submit</button>
        </div>
    </form>


    <div class = " flex mb-4 font-bold text-xl justify-center ">
    
    <form  method='get' action = '/' >
        <button type = "submit" formaction="/" method class = "bg-red-500 text-white px-4 py-1 
                rounded font-medium mt-2">Skip</button>
    </form>
     
    </div>

   

</div>
</div>
@endsection