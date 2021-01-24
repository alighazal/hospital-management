@extends('layout.app')

@section('title')
<title>Doctor's Index</title>
@endsection

@section('content')
    <div class = "h-screen bg-white flex  flex-column justify-center" >
        <div class = "w-8/12 bg-gray-100 p-6" >
            <div class = "text-4xl">Hospital's Index</div>  
            <div class = "border-b-4 border-black mb-4 "></div>
            @if ($hospitals->count())
                @foreach($hospitals as $hospital )
                    <div class ="mb-4 flex justify-between">
                        <div >
                            <div> <strong> Name:</strong>  {{$hospital->name}} </div>
                            <div> <strong> Address:</strong>  {{$hospital->address}} </div>
                            <div>  <strong> Founding Date:</strong> {{$hospital->fouding_date}} </div>
                            <div>  <strong>  Type:</strong>    {{$hospital->type}} </div>
                        </div>
                        <!-- add reservation func -->
                        <div>
                        <!-- TODO STILL NEEDS VERIICATION AND ... ETC -->
                            <button type = "submit"  
                            @guest
                            class = "bg-gray-500 text-white px-4 py-1 rounded font-medium " disabled 
                            @else
                            class = "bg-blue-500 text-white px-4 py-1 rounded font-medium " disabled
                            @endguest> delete </button>
                        </div>
                    </div>
                    <div class = "border-b-2 border-black mb-2"></div>
                @endforeach

            @else 
                <p>No Hospitals Here</p>
            @endif

        </div>
    </div>
@endsection