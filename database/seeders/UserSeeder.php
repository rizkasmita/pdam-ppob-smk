<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'rizka',
            'username' => 'starystealer',
            'email' => 'starystealer@gmail.com',
            'level' => 'superadmin',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'marky',
            'username' => 'onyourm__ark',
            'email' => 'onyourmark@gmail.com',
            'level' => 'petugas',
            'password' => bcrypt('12345')
        ]);

        // User::create([
        //     'name' => 'haechan',
        //     'username' => 'haechan',
        //     'email' => 'haechan@gmail.com',
        //     'level' => 'ori',
        //     'password' => bcrypt('12345')
        // ]);
    }
}
