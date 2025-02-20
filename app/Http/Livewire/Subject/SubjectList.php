<?php

namespace App\Http\Livewire\Subject;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class SubjectList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';

    public $selectedSubjectId;

    protected $listeners = ['closeModal' => 'clearSelectedSubject'];

    public function showSubjectDetail($subjectId)
    {
        $this->selectedSubjectId = $subjectId;
        $this->emit('openModal', $subjectId);
    }

    public function clearSelectedSubject()
    {
        $this->selectedSubjectId = null;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $subjects = Subject::where('code', 'like', "%{$this->search}%")
        ->paginate(10);

        return view('livewire.subject.subject-list', compact('subjects'));
    }
}
