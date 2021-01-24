@extends('layout.app')

@section('title')
<title>Doctor's Index</title>
@endsection

@section('content')
    <div class = "h-screen bg-white flex  flex-column justify-center" >
        <div class = "w-8/12 bg-gray-100 p-6" >
            <div class = "text-4xl">Doctor's Index</div>  
            <div class = "border-b-4 border-black mb-4 "></div>
            @if ($doctors->count())
                @foreach($doctors as $doctor )
                    <div class ="mb-4 flex justify-between">
                        <div >
                            <div>  {{$doctor->name}} </div>
                        </div>
                        <!-- add reservation func -->
                        <div>
                            <form >
                                <div class = "mr-2">
                                    <button type = "submit"  
                                    @guest
                                    class = "bg-gray-500 text-white px-4 py-1 rounded font-medium " disabled 
                                    @else
                                    class = "bg-blue-500 text-white px-4 py-1 rounded font-medium "
                                    @endguest> Reserve </button>
                                </div>
                            </form>
                            @auth
                            @hospital_admin
                            <form>
                                <div class = "mr-2">
                                    <button type = "submit"  
                                        class = "bg-green-500 text-white px-4 py-1 rounded font-medium " disabled 
                                    > Hire </button>
                                </div>
                            </form>
                            @endhospital_admin
                            @endauth
                        </div>
                    </div>
                    <div class = "border-b-2 border-black mb-2"></div>
                @endforeach

            @else 
                <p>no doctors added</p>
            @endif

        </div>
    </div>
@endsection