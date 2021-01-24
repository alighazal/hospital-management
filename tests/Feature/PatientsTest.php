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

        $this->assertCount(0, Patient::all());
      
        $response = $this->post('/patient/', [
            "user_id" => 1,
            "name" => "Bebo fit",
            "dob" => "15/3/2000",
        ]);

        $this->assertCount(1, Patient::all());

        $patient = Patient::first();

        //dd($patient);

        $this->assertEquals($patient["name"], "Bebo fit" );
        $this->assertEquals($patient["dob"], "15/3/2000" );

        $response->assertRedirect($patient->path());
    }

    /** @test */
    public function can_update_a_patient(){

        $this->assertCount(0, Patient::all());
        $patient  = Patient::create([
            "user_id" => 1,
            "name" => "Bebo fit",
            "dob" => "15/3/2000",
        ]);
        $this->assertCount(1, Patient::all());

        //dump(Patient::all()->first());
        $new_patient = [
            "user_id" => 1,
            "name" => "Ali fat",
            "dob" => "12/1/1998",
        ];
        
        $response = $this->patch($patient->path(), $new_patient);
        
        $patient->refresh();
        
        //dd(Patient::all()->first());

        $this->assertEquals($patient["name"], "Ali fat" );
        $this->assertEquals($patient["dob"], "12/1/1998" );

        $response->assertRedirect($patient->path());
    }

    /** @test */
    public function can_delete_a_patient(){
      
        $this->assertCount(0, Patient::all());
        $patient  = Patient::create([
            "user_id" => 1,
            "name" => "Bebo fit",
            "dob" => "15/3/2000",
        ]);
        $this->assertCount(1, Patient::all());
        
        $response = $this->delete($patient->path());
        $this->assertCount(0, Patient::all());

        $response->assertRedirect('/');

    }
    





}