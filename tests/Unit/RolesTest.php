<?php

namespace Tests\Unit;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; 

/**
 * While running TestCase in Laravel 6.x and above, I often encounter this error. I realized that the unit test is extended from PHPUnit TestClass rather than Laravel TestCase. So change PHPUnit\Framework\TestCase; to Tests\TestCase.
 */

class RolesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_assign_role_to_a_user()
    {

        $this->withoutExceptionHandling();

        $this->assertCount(0, Doctor::all());
        $this->assertCount(0, User::all());

        $user = [
            "name"      => "Test Test",
            "email"     => "test@test.com",
            "username"  => "tt",
            "password"  => "password",
            "password_confirmation" => "password",
            "role" => User::UserRole['Doctor']
        ];

        $this->post('/register', $user);

        $this->assertCount(1, Doctor::all());
        $this->assertCount(1, User::all());
       
        $this->assertEquals(Doctor::first()->user, User::first() );
    }

    /* add more tests */

}
