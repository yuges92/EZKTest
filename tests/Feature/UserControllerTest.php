<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * @test
     */
    public function canSeeCreateUserForm()
    {
        $response = $this->get(route('users.create'));
        $response->assertStatus(200);
        $response->assertSee('New User Registration');
        $response->assertViewIs('register');
    }

    /**
     * @test
     */
    public function canCreateAUser()
    {
        $userData = factory(User::class)->make()->toArray();
        $response = $this->post(route('users.store'), $userData);
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('users', $userData);
        $response->assertSessionHas('status', 'Successfully created');
    }

    /**
     * @test
     */
    public function canViewAUserDetail()
    {

        $userData = factory(User::class)->create();
        $response = $this->get(route('users.show', $userData->id));
        $response->assertSessionDoesntHaveErrors();
        $response->assertSuccessful();
        $response->assertViewIs('user');
        $response->assertSee($userData->firstName);

    }

    /**
     * @test
     */
    public function canGetAUserDetail()
    {
        $userData = factory(User::class)->create();
        $response = $this->getJson(route('users.show', $userData->id));
        $response->assertStatus(201);
        $data = ($response->decodeResponseJson());
        $this->assertEquals($userData->rate, $data[$userData->currency]);
    }


}
