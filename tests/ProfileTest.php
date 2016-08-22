<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class ProfileTest
 */
class ProfileTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET|HEAD: /profile/settings
     *
     * @group profile
     * @group all
     */
    public function testProfileGet()
    {
        $route = route('profile.settings');

        $this->authencation();
        $this->visit($route);
        $this->seeStatusCode(200);
    }

    public function testUpdateInformation()
    {
        $this->authencation();

        // With validation errors

        // Without validation errors

    }

    public function testUpdatePassword()
    {
        $this->authencation();
    }
}
