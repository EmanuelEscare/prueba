<?php

namespace App\Http\Livewire\Subject;

use App\Models\Subject;
use Livewire\Component;

class SubjectDetail extends Component
{
    public $subject;

    public function mount($subjectId)
    {
        $this->subject = Subject::findOrFail($subjectId);
    }

    public function render()
    {
        return view('livewire.subject.subject-detail');
    }
}
