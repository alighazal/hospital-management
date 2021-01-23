<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class doctorController extends Controller
{
    //

    public function create() {

        $user = Auth::user();
        $doctor = Doctor::where('user_id', $user->id)->first();
        return view('profiles.doctor')->with('doctor', $doctor);
    }

    public function store() {
        $doctor = $this->dataValidator();
        $respone = Doctor::create($doctor);
        //return redirect($respone->path());
        return redirect('/');
    }

    public function update ($id) {

        $doctor = Doctor::where('user_id', $id)->first();
        $newDoctor = $this->dataValidator();
        $doctor->update($newDoctor);
        return redirect('/');
    }

    public function destroy (Doctor $doctor){
        $doctor->delete();
        return redirect('/');
    }



    private function dataValidator(){
        return request()->validate([
            "name" => "",
            "dob" => "",
            "speciality" => "",
            "graduation_date" => "",
            "seniority" => "",
            "alma_mater" => ""
        ]);
    }
}
