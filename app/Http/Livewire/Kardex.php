<?php

namespace App\Http\Livewire;

use App\Concerns\Traits\WithStudentSelect;
use Livewire\Component;

class Kardex extends Component
{
    use WithStudentSelect;

    public $selectedSubjectId = null;

    public function render()
    {
        return view('livewire.kardex');
    }

    public function removeGrade($subjectId): void
    {
        $this->selectedStudent->subjects()->detach($subjectId);

        $this->selectedStudent->refresh();

        session()->flash('message', __('Subject has been unregistered'));
    }

    public function gradeSubject($subjectId)
    {
        $this->selectedSubjectId = $subjectId;
    }
}
