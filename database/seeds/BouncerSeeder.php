<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\Database\Role;

/**
 * Class BouncerSeeder
 */
class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Management']);
    }
}
