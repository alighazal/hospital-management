<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class patientController extends Controller
{
    public function store(){   
        $patient =  Patient::create($this->dataValidator());       
        //dd($patient->path());
        return redirect($patient->path());
    }

    public function update(Patient $patient){   
        $patient->update($this->dataValidator());       
        return redirect($patient->path());
    }

    public function destroy(Patient $patient){   
        $patient->delete();     
        return redirect('/');
    }

    private function dataValidator(){
        return request()->validate([
            "user_id" => "required",
            "name" => "required",
            "dob" => "required"
        ]);
    }
}
