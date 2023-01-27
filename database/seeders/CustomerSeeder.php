<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Nette\Utils\Random;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'mark',
            'code' => '0000001',
            'address' => 'canada',
            'category_id' => 1
        ]);
    }
}
