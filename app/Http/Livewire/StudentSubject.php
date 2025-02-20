<?php

namespace App\Http\Livewire;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Collection;
use Livewire\Component;

class StudentSubject extends Component
{

    public $searchStudent = '';

    public $searchSubject = '';

    public $students = [];

    /**
     * @var int $student_id
     */
    public $student;

    /**
     * @var int $subject_id
     */
    public $subject;

    public function rules(): array
    {
        return [
            'student' => 'required|exists:students,id',
            'subject' => 'required|exists:subjects,id',
        ];
    }

    protected $listeners = ['searchStudentInput' => 'updateSearchStudent'];

    public function updateSearchStudent($value)
    {
        $this->searchStudent = $value;
        $this->students = Student::where('code', 'like', "%{$this->searchStudent}%")
                                    ->take(10)
                                    ->get();
    }

    public function mount()
    {
        $this->students = Student::take(10)->get();
    }

    public function render()
    {
        return view('livewire.student-subject');
    }

    public function save()
    {
        $student = Student::find($this->student);
        $student->subjects()->attach($this->subject);

        $this->reset('student', 'subject');
    }

    public function getSubjectsProperty(): Collection
    {
        return Subject::get();
    }
}
