<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_reach_home_directory(){
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function can_reach_registeration_page(){
        $response = $this->get('/register');
        $response->assertStatus(200);
    }


    /** @test */
    public function can_register(){
        
        $this->withoutExceptionHandling();


        $this->assertCount(0, User::all());

        $response = $this->post('/register', [
            "name"      => "Test Test",
            "email"     => "test@test.com",
            "username"  => "tt",
            "password"  => "password",
            "password_confirmation" => "password",
            "role" => 0
        ]);


        $this->assertCount(1, User::all());

    }

    /** @test */
    public function registeration_email_validation(){

        $this->assertCount(0, User::all());
        $response = $this->post('/register', [
            "name"      => "Test Test",
            "email"     => "test",
            "username"  => "tt",
            "password"  => "password",
            "password_confirmation" => "password"
        ]);
        $response->assertSessionHasErrors('email');

    }

    /** @test */

    

    
}
