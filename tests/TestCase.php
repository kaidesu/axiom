<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Sign in as a user.
     * 
     * @param  User|null
     * @return void
     */
    protected function signIn($user = null)
    {
        return $this->actingAs($user ?: factory('App\User')->create());
    }
}
