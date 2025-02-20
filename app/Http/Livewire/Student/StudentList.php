<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';

    public $selectedStudentId;

    protected $listeners = ['closeModal' => 'clearSelectedStudent'];

    public function showStudentDetail($studentId)
    {
        $this->selectedStudentId = $studentId;
        $this->emit('openModal', $studentId);
    }

    public function clearSelectedStudent()
    {
        $this->selectedStudentId = null;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $students = Student::where('code', 'like', "%{$this->search}%")
        ->paginate(10);

        return view('livewire.student.student-list', compact('students'));
    }
}
