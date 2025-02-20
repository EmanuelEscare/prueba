<div>
    <form wire:submit.prevent="save" class="mt-5">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">{{ __('Select a student') }}</label>
            <select wire:model="student" id="student_id" class="w-full mt-1 p-2 border rounded">
                <option value="">{{ __('Select a student') }}</option>
                @foreach ($this->students as $student)
                    <option value="{{ $student->id }}">{{ $student->code }} - {{ $student->name }}
                        {{ $student->lastname }}</option>
                @endforeach
            </select>
            @error('student')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
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

    @push('select2')
        <script>
            document.addEventListener('livewire:load', function() {
                $('#student_id').select2();

                // $('#student_id').on('select2:open', function() {
                //     setTimeout(() => {
                //         let searchInput = $('.select2-search__field');
                //         searchInput.on('input', function() {
                //             @this.set('searchStudent', this.value);
                //         });
                //     }, 100);
                // });

                $('#student_id').on('change', function() {
                    @this.set('student', this.value);
                });
            });

            function initSelect2() {
                $('#student_id').select2();
                $('#student_id').on('select2:open', function() {
                    setTimeout(() => {
                        let searchInput = $('.select2-search__field');
                        searchInput.off('input').on('input', function() {
                            Livewire.emit('searchStudentInput', this.value);
                        });
                    }, 100);
                });
            }

            document.addEventListener('livewire:load', function() {
                initSelect2();
            });

            document.addEventListener("livewire:update", function() {
                initSelect2();
            });
        </script>
    @endpush
</div>
