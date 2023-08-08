<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'categorytitle' => 'elektronik',
            'categorydescription' => 'elektronik eşyalar',
            'categorystatus' => 0,
        ]);
        Category::create([
            'categorytitle' => 'kırtasiye',
            'categorydescription' => 'kırtasiye eşyaları',
            'categorystatus' => 0,
        ]);
        Category::create([
            'categorytitle' => 'giyim',
            'categorydescription' => 'giyim eşyaları',
            'categorystatus' => 0,
        ]);

    }
}
