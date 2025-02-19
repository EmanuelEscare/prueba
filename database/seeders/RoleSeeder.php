<?php

namespace Database\Seeders;

use App\Contracts\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => UserRoles::ADMIN]);
        $teacherRole = Role::firstOrCreate(['name' => UserRoles::TEACHER]);
    }
}
