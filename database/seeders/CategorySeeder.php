<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categories')->insert([
        //     'name' => 'Sosial'
        // ]);

        Category::create([
            'name' => 'Sosial',
            'tarif1' => 1000,
            'tarif2' => 2000,
            'tarif3' => 3000,
            'tarif4' => 4000
        ]);
        // Category::create([
        //     'name' => 'Publik'
        // ]);
        // Category::create([
        //     'name' => 'Rumah Tangga'
        // ]);
    }
}
