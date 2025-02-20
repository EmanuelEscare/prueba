<div>
    <form wire:submit.prevent="save" class="mt-5">
        <div class="mt-2 mb-4">
            <label class="block text-sm font-medium text-gray-700">{{ __('Select a student') }}</label>
            {{--  --}}
            <div class="relative w-94" x-data="{ open: false }">
                <input type="text" wire:model="searchStudent" placeholder="{{__('Search by code')}}"
                    @focus="open = true"
                    @click.away="open = false;"
                    class="w-full mt-1 p-2 border rounded"
                />
            
                @if(!empty($students))
                    <ul class="absolute w-full bg-white border rounded mt-1 shadow-md z-50 
                   max-h-48 overflow-y-auto" x-show="open">
                        @foreach($students as $student)
                            <li wire:click="selectStudent({{ $student->id }})"
                                class="px-3 py-2 cursor-pointer hover:bg-gray-200">
                                <b>{{ $student->code }}</b> - {{ $student->name }} {{ $student->lastname }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            
                @if($selectedStudent)
                    <p class="mt-2 text-sm text-gray-600">Seleccionado: <strong><b>{{ $selectedStudent->code }}</b> - {{ $selectedStudent->name }} {{ $selectedStudent->lastname }}</strong></p>
                @endif
            </div>
            {{--  --}}
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">{{ __('Select a subject') }}</label>
            <select wire:model="subject" class="w-full mt-1 p-2 border rounded">
                <option value="">{{ __('Select a subject') }}</option>
                @foreach ($this->subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->code }} - {{ $subject->name }}</option>
                @endforeach
            </select>
            @error('subject')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition">
            {{ __('Save') }}
        </button>
    </form>
</div>
