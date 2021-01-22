<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DoctorsTest extends TestCase
{
    use RefreshDatabase;

      /** @test */
    public function can_create_a_doctor() {

        $this->withoutExceptionHandling();

        $this->assertCount(0, Doctor::all());

        $doctor = [
            "name" => "Ali Ghazal",
            "dob" => "17/12/1999",
            "speciality" => "GP",
            "graduation_date" => "15/7/2015",
            "seniority" => "junior",
            "alma_mater" => "cairo university"
        ];

        $response = $this->post('/doctor', $doctor);
        $this->assertCount(1, Doctor::all());
        $created_doctor = Doctor::first();

        /** TODO check each field */

        $response->assertRedirect($created_doctor->path());
    }


    /** @test */
    public function can_update_a_doctor() {

        $this->withoutExceptionHandling();

        $doctor = [
            "name" => "Ali Ghazal",
            "dob" => "17/12/1999",
            "speciality" => "GP",
            "graduation_date" => "15/7/2015",
            "seniority" => "junior",
            "alma_mater" => "cairo university"
        ];

        $doctor = Doctor::create($doctor);

        $new_doctor = [
            "name" => "Ali Ghazal",
            "dob" => "17/12/1999",
            "speciality" => "GP",
            "graduation_date" => "15/7/2015",
            "seniority" => "senior",
            "alma_mater" => "alexandria university"
        ];

        $response = $this->patch($doctor->path(), $new_doctor);

        $doctor = $doctor->fresh();

        $this->assertEquals($doctor['seniority'],  "senior");
        $this->assertEquals($doctor['alma_mater'],  "alexandria university");

        $response->assertRedirect($doctor->path());

    }

    /** @test */
    public function can_delete_a_doctor() {

        $this->withoutExceptionHandling();

        $doctor = [
            "name" => "Ali Ghazal",
            "dob" => "17/12/1999",
            "speciality" => "GP",
            "graduation_date" => "15/7/2015",
            "seniority" => "junior",
            "alma_mater" => "cairo university"
        ];

        $doctor = Doctor::create($doctor);

        $this->assertCount(1, Doctor::all());

        $response = $this->delete($doctor->path());

        $this->assertCount(0, Doctor::all());

        $response->assertRedirect('/');    
    
    }




}