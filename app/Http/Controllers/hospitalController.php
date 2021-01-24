<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hospitalController extends Controller
{
    

    public function create(){
 
        return view('profiles.hospital');
    }


    public function index(){

        $hospitals  = Hospital::latest()->paginate(25);
 
        return view('indices.hospitals', [
            "hospitals" => $hospitals
        ]);
    }


    public function store(){

        //dump(request());

        $hospital = $this->dataValidator();

        $created_hospital = Hospital::create($hospital);
        $created_hospital->admin()->associate(Auth::user()->id);

        $created_hospital->save();


        //dump($created_hospital->id);
        //dd($created_hospital->admin->id);

        return redirect('/');
    }

    public function destroy (Hospital $hospital){
        $hospital->delete();
        return redirect('/');
    }

    public function update (Hospital $hospital) {
 
        $newHospital = $this->dataValidator();

        $hospital->update($newHospital);

        return redirect($hospital->path());


    }

    private function dataValidator () {
       return  request()->validate([
            "name" => "required",
            "address" => "required",
            "founding_date" => "required",
            "type" => "required"
        ]);
    }



}
