<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = Subject::limit(5)->pluck('id')->toArray();

        $students = Student::factory(200)->create();

        foreach ($students as $student) {
            $student->subjects()->attach($subjects);
        }
    }
}
