<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class GradeSubject extends Component
{
    public $subjectId;
    public $student;
    public $subject;

    public $grade;

    public function rules()
    {
        return [
            'grade' => 'required|integer|min:0|max:100',
        ];
    }

    public function mount($subjectId, $studentId)
    {
        $this->subjectId = $subjectId;

        $this->student = Student::select('id', 'name', 'lastname')->with('subjects')->findOrFail($studentId);
        $this->subject = $this->student->subjects->find($subjectId);
    }

    public function save()
    {
        $this->validate();

        $this->student->subjects()->sync([
            $this->subjectId => ['grade' => $this->grade]
        ]);

        session()->flash('message', __('Grade has been saved'));
    }

    public function render()
    {
        return view('livewire.grade-subject');
    }
}
