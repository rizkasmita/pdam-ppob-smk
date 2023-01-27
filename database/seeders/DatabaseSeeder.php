<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penalty;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CustomerSeeder::class,
            CategorySeeder::class,
            UserSeeder::class
        ]);

        Penalty::create([
            'category_id' => 1,
            'fee' => 10000
        ]);
    }
}
