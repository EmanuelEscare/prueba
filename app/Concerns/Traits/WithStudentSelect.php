<?php

namespace App\Concerns\Traits;

use App\Models\Student;

trait WithStudentSelect
{
    public $selectedStudent = null;

    public $searchStudent = '';

    public $students = [];

    public function __construct() {
        $this->students = Student::take(10)->get();
    }

    public function updatedSearchStudent(): void
    {
        if ($this->searchStudent !== '') {
            $this->students = Student::where('code', 'like', "%{$this->searchStudent}%")
                ->take(5)
                ->get();
        } else {
            $this->students = Student::take(10)->get();
        }
    }

    public function selectStudent($id): void
    {
        $this->selectedStudent = Student::find($id);
        $this->reset('searchStudent');
    }
}