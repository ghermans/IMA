<?php

/**
 * Class TestCase
 */
abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * @var FakerGenerator
     */
    protected $faker;

    /**
     * @var user factory
     */
    protected $user;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Faker & factory init
     */
    public function setUp()
    {
        parent::setUp();

        // Factory stubs.
        $this->faker = \Faker\Factory::create();
        $this->user  = factory(App\User::class)->create();
    }

    /**
     * Check for authencation.
     */
    protected function authencation()
    {
        $this->actingAs($this->user);
        $this->seeIsAuthenticatedAs($this->user);
    }
}
