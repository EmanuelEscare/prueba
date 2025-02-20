<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentDetail extends Component
{
    public $student;

    public function mount($studentId)
    {
        $this->student = Student::findOrFail($studentId);
    }

    public function render()
    {
        return view('livewire.student-detail');
    }
}
