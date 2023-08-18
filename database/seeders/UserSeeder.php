<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Oak Soe Aung",
            'email' => 'oaksoeaung01@kbtc.edu.mm',
            'password' => Hash::make('Butterflies123$'),
            'is_verified' => '1',
        ]);
        User::create([
            'name' => "Htet Hnin Oo",
            'email' => 'htethninoo@kbtc.edu.mm',
            'password' => Hash::make('Butterflies123$'),
            'is_verified' => '1',
        ]);
    }
}
