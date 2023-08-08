<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'producttitle' => 'kitap',
            'productcategoryid' => '2',
            'barcode' => '123456',
            'productstatus' => 1,
        ]);
        Product::create([
            'producttitle' => 'televizyon',
            'productcategoryid' => '1',
            'barcode' => '123478',
            'productstatus' => 0,
        ]);
        Product::create([
            'producttitle' => 'laptop',
            'productcategoryid' => '1',
            'barcode' => '123498',
            'productstatus' => 0,
        ]);
        Product::create([
            'producttitle' => 'ayakkabı',
            'productcategoryid' => '3',
            'barcode' => '124456',
            'productstatus' => 1,
        ]);

    }
}
