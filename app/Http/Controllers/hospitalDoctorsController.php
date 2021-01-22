<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;

class hospitalDoctorsController extends Controller
{
    //
    public function store(Hospital $hospital)
    {
        $hospital->doctors()->attach(request("doctor_id"));    
    }

    public function destroy(Hospital $hospital, Doctor $doctor)
    {
        $hospital->doctors()->detach($doctor->id);    
    }
}
