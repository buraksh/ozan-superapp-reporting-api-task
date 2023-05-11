<?php

namespace Tests;

use App\Models\Merchant;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    protected function actingAsUser(?Merchant $user = null): TestCase
    {
        if (! $user) {
            $user = Merchant::factory()->create();
        }

        return $this->actingAs($user);
    }
}
