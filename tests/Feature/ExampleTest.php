<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeResponseStatus()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAuthentication()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }

    public function testDatabaseUsers()
    {
        factory(User::class)->create(['email' => 'teste@teste.com.br']);
        $this->assertDatabaseHas('users', ['email' => 'teste@teste.com.br']);
    }
}
