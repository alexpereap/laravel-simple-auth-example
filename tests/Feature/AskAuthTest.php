<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class AskAuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRedirectsToLogin()
    {
        $response = $this->get('/');
        $response->assertRedirect(route('login'));

        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('login'));

        $response = $this->get(route('logout'));
        $response->assertRedirect(route('login'));
    }

    public function testIsAuthenticated(){

        $user = User::find(2);
        $this->be($user);

        /*$response = $this->actingAs($user)
                    ->get(route('dashboard'));*/
        
        $response = $this->get(route('dashboard'));
        $response->assertStatus(200);

        $response = $this->get(route('login'));
        $response->assertRedirect(route('dashboard'));
    }

}
