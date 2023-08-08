<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'ahmet',
            'usertitle' => 'intern',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'username' => 'hasan',
            'usertitle' => 'intern',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'username' => 'falan',
            'usertitle' => 'intern',
            'password' => Hash::make('123456'),
        ]);
    }
}
