<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::updateOrCreate([
            'code' => '1001',
        ],[
            'name' => 'Matemáticas',
            'description' => 'Matemáticas básicas',
            'credits' => 6,
        ]);

        Subject::updateOrCreate([
            'code' => '1010',
        ],[
            'name' => 'Lengua Extranjera',
            'description' => 'Inglés',
            'credits' => 3,
        ]);

        Subject::updateOrCreate([
            'code' => '1011',
        ],[
            'name' => 'Ciencias Naturales',
            'description' => 'Biología',
            'credits' => 3,
        ]);

        Subject::updateOrCreate([
            'code' => '1020',
        ],[
            'name' => 'Historia',
            'description' => 'Historia de Jalisco',
            'credits' => 2,
        ]);

        Subject::updateOrCreate([
            'code' => '1021',
        ],[
            'name' => 'Geografía',
            'description' => 'Geografía',
            'credits' => 3,
        ]);

        Subject::updateOrCreate([
            'code' => '1022',
        ],[
            'name' => 'Programación I',
            'description' => 'Programación básica',
            'credits' => 3,
        ]);

        Subject::updateOrCreate([
            'code' => '1223',
        ],[
            'name' => 'Base de datos',
            'description' => 'Base de datos relacionales',
            'credits' => 3,
        ]);

        Subject::updateOrCreate([
            'code' => '1189',
        ],[
            'name' => 'Mineria de datos',
            'description' => 'Mineria de datos y analisis de datos',
            'credits' => 8,
        ]);

        Subject::updateOrCreate([
            'code' => '1090',
        ],[
            'name' => 'Ingenieria de software',
            'description' => 'Ingenieria de software - SCRUM',
            'credits' => 10,
        ]);

        Subject::updateOrCreate([
            'code' => '1117',
        ],[
            'name' => 'Programación II',
            'description' => 'Programación web y desarrollo de aplicaciones moviles',
            'credits' => 9,
        ]);

        Subject::updateOrCreate([
            'code' => '1270',
        ],[
            'name' => 'Programación III',
            'description' => 'Programación utilizando microservicios',
            'credits' => 9,
        ]);
    }
}
