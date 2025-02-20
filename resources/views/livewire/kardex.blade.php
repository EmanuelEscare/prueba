<div>
    <div class="my-6 min-h-40">
        {{-- Student select --}}
        <label class="block text-sm font-medium text-gray-700">{{ __('Select a student') }}</label>
        <div class="relative w-94" x-data="{ open: false }">
            <input type="text" wire:model="searchStudent" placeholder="{{ __('Search by code') }}" @focus="open = true"
                @click.away="open = false;" class="w-full mt-1 p-2 border rounded" />

            @if (!empty($students))
                <ul class="absolute w-full bg-white border rounded mt-1 shadow-md z-50 
                           max-h-48 overflow-y-auto"
                    x-show="open">
                    @foreach ($students as $student)
                        <li wire:click="selectStudent({{ $student->id }})"
                            class="px-3 py-2 cursor-pointer hover:bg-gray-200">
                            <b>{{ $student->code }}</b> - {{ $student->name }} {{ $student->lastname }}
                        </li>
                    @endforeach
                </ul>
            @endif

            @if ($selectedStudent)
                <p class="mt-12 text-sm text-gray-600">Seleccionado:</p>
                <h1 class="text-2xl">
                    <strong><b>{{ $selectedStudent->code }}</b> -
                        {{ $selectedStudent->name }} {{ $selectedStudent->lastname }}</strong>
                </h1>
                <br>
                <p><strong>{{__('Email')}}:</strong> {{ $student->email }}</p>
                <p><strong>{{__('Phone')}}:</strong> {{ $student->phone }}</p>
                <p><strong>{{__('Address')}}:</strong> {{ $student->address }}</p>
                <p><strong>{{__('Gender')}}:</strong> {{ __($student->gender) }}</p>
                <p><strong>{{__('Birthdate')}}:</strong> {{ $student->birth_date }}</p>
                <p><strong>{{__('Entry date')}}:</strong> {{ $student->entry_date }}</p>
            @endif
        </div>
        <br>
        <div>
            @if ($selectedStudent)
                <div class="overflow-x-auto ">
                    <table class="w-full">
                        <thead class="bg-gray-50 border">
                            <tr>
                                <th class="p-4 text-center border-b">{{ __('Code') }}</th>
                                <th class="p-4 text-center border-b">{{ __('Name') }}</th>
                                <th class="p-4 text-center border-b">{{ __('Credits') }}</th>
                                <th class="p-4 text-center border-b">{{ __('Grade') }}</th>
                                <th class="p-4 text-center border-b"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($selectedStudent->subjects as $subject)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4 text-center border-b">{{ $subject->code }}</td>
                                    <td class="p-4 text-center border-b">{{ $subject->name }}</td>
                                    <td class="p-4 text-center border-b">{{ $subject->credits }}</td>
                                    <td class="p-4 text-center border-b">{{ $subject->pivot->grade? $subject->pivot->grade : '-' }}</td>
                                    <td class="p-4 text-center border-b">
                                        @if (!$subject->pivot->grade)
                                            <button wire:click="gradeSubject({{ $subject->id }})"
                                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                                {{ __('Grade subject') }}
                                            </button>

                                            <button wire:click="removeGrade({{ $subject->id }})"
                                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                {{ __('Unsubscribe') }}
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <p class="text-center mt-6">
                                            {{ __('No subjects added') }}
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <div class="my-4">
            @if (session()->has('message'))
                <div
                    x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" 
                    class="p-2 rounded-lg bg-emerald-600 text-white">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>

    @if($selectedSubjectId)
        <livewire:grade-subject :subjectId="$selectedSubjectId" :studentId="$selectedStudent->id"/>
    @endif
</div>
