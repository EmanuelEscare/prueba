<?php

namespace App\Http\Livewire;

use App\Concerns\Traits\WithStudentSelect;
use App\Models\Subject;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class StudentSubject extends Component
{
    use WithStudentSelect;
    
    public $subject;
    
    public function rules(): array
    {
        return [
            'selectedStudent' => 'required',
            'subject' => 'required',
        ];
    }

    public function render(): View
    {
        return view('livewire.student-subject');
    }

    public function save(): void
    {
        $this->validate();
        
        $this->selectedStudent->subjects()->attach($this->subject);

        session()->flash('message', __('Subject has been added to student'));

        $this->reset('selectedStudent', 'subject');
    }

    public function getSubjectsProperty(): Collection
    {
        return Subject::get();
    }
}
