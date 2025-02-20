<?php

namespace Database\Seeders;

use App\Contracts\UserRoles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(20)->teacher()->create();

        User::factory(3)->admin()->create();

        $user = User::firstOrCreate(
            [
                'email' => 'maestro@prueba.mx',
            ],
            [
                'name' => 'Lic. Adolfo Lopez',
                'password' => Hash::make('asdf1234'),
            ]
        );

        $user->assignRole(UserRoles::TEACHER);
    }
}
