<?php

namespace Tests\Feature;

use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PatientsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_a_patient(){
      
        $response = $this->post('/patient/', [
            "name" => "Bebo fit",
            "dob" => "15/3/2000",
        ]);

        $this->assertCount(1, Patient::all());

        $patient = Patient::first();
        $this->assertEquals($patient["name"], "Bebo fit" );
        $this->assertEquals($patient["dob"], "15/3/2000" );

        $response->assertRedirect($patient->path());
    }

    /** @test */
    public function can_update_a_patient(){

        $this->assertCount(0, Patient::all());
        $patient  = Patient::create([
            "name" => "Bebo fit",
            "dob" => "15/3/2000",
        ]);
        $this->assertCount(1, Patient::all());

        $new_patient = [
            "name" => "Ali fat",
            "dob" => "12/1/1998",
        ];

        $response = $this->patch($patient->path(), $new_patient);

        $patient->refresh();

        $this->assertEquals($patient["name"], "Ali fat" );
        $this->assertEquals($patient["dob"], "12/1/1998" );

        $response->assertRedirect($patient->path());
    }

    /** @test */
    public function can_delete_a_patient(){
      
        $this->assertCount(0, Patient::all());
        $patient  = Patient::create([
            "name" => "Bebo fit",
            "dob" => "15/3/2000",
        ]);
        $this->assertCount(1, Patient::all());
        
        $response = $this->delete($patient->path());
        $this->assertCount(0, Patient::all());

        $response->assertRedirect('/');

    }
    





}