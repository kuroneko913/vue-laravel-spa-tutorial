<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function should_新しいユーザーを作成して返却する()
    {
        $data = [
            'name' => 'photo-app user',
            'email' => 'dummy@dmail.com',
            'password' => 'Password1234!',
            'password_confirmation' => 'Password1234!',
        ];
        $this->withoutExceptionHandling();
        $response = $this->json('POST', route('register'), $data);

        $user = User::first();
        $this->assertSame($data['name'], $user->name);

        $response
            ->assertStatus(201)
            ->assertJson(['name' => $user->name]);
    }
}
