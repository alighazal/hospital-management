<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class hospitalController extends Controller
{
    

    public function store(){

        $hospital = $this->dataValidator();

        $created_hospital = Hospital::create($hospital);

        return redirect($created_hospital->path());
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
