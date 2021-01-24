<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;

class HospitalTest extends TestCase
{

    use RefreshDatabase;
    use DatabaseMigrations;

    /** @test */
    public function can_create_a_hospital(){

        $this->withoutExceptionHandling();

        $response = $this->post('/hospital', [
            "name" => 'Hospital 1',
            "address" => 'street, city, country',
            "type" => 'private',
            "founding_date" => '1/1/1950'
        ]);

        //$hospital = Hospital::first();
        $this->assertCount(1, Hospital::all());

        $created_hospital = Hospital::first();

        //dd($created_hospital["id"], );

        $this->assertEquals($created_hospital["id"],1);
        $this->assertEquals($created_hospital["name"], 'Hospital 1' );
        $this->assertEquals($created_hospital["address"], 'street, city, country');
        $this->assertEquals($created_hospital["type"], 'private');
        $this->assertEquals($created_hospital["founding_date"], '1/1/1950');

        $response->assertRedirect('/');

    }

    /** @test */
    public function can_delete_a_hospital(){

        $this->withoutExceptionHandling();

        Hospital::Create([
            "name" => 'Hospital 1',
            "address" => 'street, city, country',
            "type" => 'private',
            "founding_date" => '1/1/1950'
        ]);

        $hospital = Hospital::first();

        $this->assertCount(1, Hospital::all());

        $response = $this->delete( $hospital->path() );

        $this->assertCount(0, Hospital::all());

        $response->assertRedirect('/');
        
    }

    /** @test */
    public function can_update_a_hospital(){

        $this->withoutExceptionHandling();

        $hospital = Hospital::Create([
            "name" => 'Hospital 1',
            "address" => 'street, city, country',
            "type" => 'private',
            "founding_date" => '1/1/1950'
        ]);


        $this->assertCount(1, Hospital::all());

        $upatedHospital = [
            "name" => 'Hospital 2',
            "address" => 'street 3, city, country',
            "type" => 'public',
            "founding_date" => '1/1/1950'
        ];

        $response = $this->patch( $hospital->path() , $upatedHospital );

        $hospital = $hospital->fresh();

        $this->assertEquals($hospital["id"],1);
        $this->assertEquals($hospital["name"], 'Hospital 2' );
        $this->assertEquals($hospital["address"], 'street 3, city, country');
        $this->assertEquals($hospital["type"], 'public');
        $this->assertEquals($hospital["founding_date"], '1/1/1950');

        $response->assertRedirect($hospital->path());

    }

    /** @test */
    public function can_add_doctor_to_hospital(){

        $this->withoutExceptionHandling();

        $hospital = Hospital::Create([
            "name" => 'Hospital 1',
            "address" => 'street, city, country',
            "type" => 'private',
            "founding_date" => '1/1/1950'
        ]);

        $doctor = Doctor::create([
            "user_id" => 1,
            "name" => "Ali Ghazal",
            "dob" => "17/12/1999",
            "speciality" => "GP",
            "graduation_date" => "15/7/2015",
            "seniority" => "junior",
            "alma_mater" => "cairo university"
        ]);

        $this->post($hospital->path() . '/doctors/' ,  ["doctor_id" => $doctor->user_id ]);

        $this->assertEquals(1, $hospital->doctors()->count() );


    }

      /** @test */
      public function can_delete_a_doctor_from_hospital(){

        $this->withoutExceptionHandling();

        $hospital = Hospital::Create([
            "name" => 'Hospital 1',
            "address" => 'street, city, country',
            "type" => 'private',
            "founding_date" => '1/1/1950'
        ]);

        $doctor = Doctor::create([
            "user_id" => 1,
            "name" => "Ali Ghazal",
            "dob" => "17/12/1999",
            "speciality" => "GP",
            "graduation_date" => "15/7/2015",
            "seniority" => "junior",
            "alma_mater" => "cairo university"
        ]);

        $this->post($hospital->path() . '/doctors/' ,  ["doctor_id" => $doctor->user_id ]);
        $this->assertEquals(1, $hospital->doctors()->count() );

        $this->delete($hospital->path() . '/doctors/' . $doctor->user_id );
        $this->assertEquals(0, $hospital->doctors()->count() );



    }
    
    
}
