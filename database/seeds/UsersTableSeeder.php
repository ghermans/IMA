<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('users');

        $data['name']     = 'John Doe';
        $data['email']    = 'admin@ima.be';
        $data['password'] = bcrypt('admin');

        DB::table('users')->delete();
        $user = User::create($data);
        Bouncer::assign('administrator')->to($user);
    }
}
