<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class doctorController extends Controller
{
    //

    public function store() {
        $doctor = $this->dataValidator();
        $respone = Doctor::create($doctor);
        return redirect($respone->path());
    }

    public function update ( Doctor $doctor) {
        $newDoctor = $this->dataValidator();
        $doctor->update($newDoctor);
        return redirect($doctor->path());
    }

    public function destroy (Doctor $doctor){
        $doctor->delete();
        return redirect('/');
    }



    private function dataValidator(){
        return request()->validate([
            "name" => "required",
            "dob" => "required",
            "speciality" => "required",
            "graduation_date" => "required",
            "seniority" => "required",
            "alma_mater" => "required"
        ]);
    }
}
