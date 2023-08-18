<?php

namespace Database\Seeders;

use App\Models\UsersPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersPermission::create([
            'user_id' => '1',
            'permission_id' => '1',
        ]);
        UsersPermission::create([
            'user_id' => '1',
            'permission_id' => '2',
        ]);
        UsersPermission::create([
            'user_id' => '1',
            'permission_id' => '3',
        ]);
    }
}
