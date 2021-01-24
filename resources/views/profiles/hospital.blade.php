@extends('layout.app')

@section('title')
<title>Hospital Profile</title>
@endsection


@section('content')

<div class = "flex justify-center" >
<div class = "w-4/12 bg-white p-6 rounded-lg " >
    <div class = " flex mb-4 font-bold text-xl justify-center "> Hospital Profile</div>

    <form method = "post" action = "/hospital/" >
        @csrf 
        <div class = "mb-4">
            <label for="Name" class= "sr-only" > Hospital Name</label>
            <input type="text" name  = "name" id = "name" placeholder="Hospital Name" 
            class = "bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror " 
            value = "{{ old ('name')}}">

            @error ('name')
                <div class = "text-red-500 mt-2 text-small">
                    {{ $message}}
                </div>
            @enderror
        </div>

        <div class = "mb-4">
            <label for="address" class= "sr-only" > Address</label>
            <input type="text" name  = "address" id = "address" placeholder="Hospital Address" 
            class = "bg-gray-100 border-2 w-full p-4 rounded-lg @error('address') border-red-500 @enderror " 
            value = "{{ old ('address')}}">

            @error ('address')
                <div class = "text-red-500 mt-2 text-small">
                    {{ $message}}
                </div>
            @enderror
        </div>


        <div class = "mb-4">
            <label for="graduation_date"> Founding Date</label>
            <input type="date" name  = "founding_date" id = "founding_date" placeholder="Founding Date" 
            class = " mt-2 bg-gray-100 border-2 w-full p-4 rounded-lg  @error('founding_date') border-red-500 @enderror " 
            value = "{{ old ('founding_date')}}" >

            @error ('founding_date')
                <div class = "text-red-500 mt-2 text-small">
                    {{ $message}}
                </div>
            @enderror

        </div>

        <div class = "mb-4 flex-column justify-center">
        
            <select
                class = "p-2 rounded" 
                name="type" id="type" value = "{{ old ('type')}}">
                <option value="" selected disabled hidden>Choose Type Here</option>
                <option value="private">Private</option>
                <option value="public">Public</option>
                <option value="clinic">Clinic</option>
            </select>

            @error ('type')
                <div class = "text-red-500 mt-2 text-small">
                    {{ $message}}
                </div>
            @enderror

        </div>
                   
        <div class = "flex justify-center">
            <button type = "submit" class = "bg-blue-500 text-xl  text-white px-4 py-3 
            rounded font-medium ">Submit</button>
        </div>
    </form>


    <div class = " flex mb-4 font-bold text-l justify-center ">
    
    <form  method='get' action = '/' >
        <button type = "submit" formaction="/" method class = "bg-red-500 text-white px-4 py-1 
                rounded font-medium mt-2">Skip</button>
    </form>
     
    </div>

   

</div>
</div>
@endsection