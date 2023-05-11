<?php

namespace Tests\Feature\Http\Controllers\Merchant;

use App\Enums\Status;
use App\Models\Merchant;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    private string $url = '/api/v3/merchant/user/login';

    /** @test */
    public function it_validates_request(): void
    {
        $this->postJson($this->url)
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'email'    => trans('validation.required', ['attribute' => 'email']),
                'password' => trans('validation.required', ['attribute' => 'password']),
            ]);
    }

    /** @test */
    public function it_validates_email(): void
    {
        $this->postJson($this->url, [
            'email'    => 'test@test',
            'password' => 'password',
        ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'email' => trans('validation.email', ['attribute' => 'email']),
            ]);
    }

    /** @test */
    public function it_validates_max_email_size(): void
    {
        $this->postJson($this->url, [
            'email' => Str::random(120) . '@test.com',
        ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'email' => trans('validation.max.string', ['attribute' => 'email', 'max' => 128]),
            ]);
    }

    /** @test */
    public function it_validates_max_password_size(): void
    {
        $this->postJson($this->url, [
            'password' => Str::random(33),
        ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'password' => trans('validation.max.string', ['attribute' => 'password', 'max' => 32]),
            ]);
    }

    /** @test */
    public function it_rejects_invalid_credentials(): void
    {
        $this->postJson($this->url, [
            'email'    => 'test@test.com',
            'password' => 'password',
        ])
            ->assertUnauthorized()
            ->assertJsonFragment([
                'status' => Status::DECLINED,
            ]);
    }

    /** @test */
    public function it_logs_in_user(): void
    {
        $password = Str::random(8);

        $user = Merchant::factory()->create([
            'password' => bcrypt($password),
        ]);

        $this->postJson($this->url, [
            'email'    => $user->email,
            'password' => $password,
        ])
            ->assertOk()
            ->assertJsonFragment([
                'status' => Status::APPROVED,
            ]);
    }
}
