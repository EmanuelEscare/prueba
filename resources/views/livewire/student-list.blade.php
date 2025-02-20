<div>
    <div class="container mx-auto px-4">
        <div class="rounded-3xl bg-white border border-gray-100 shadow">

            <div class="my-2 mx-4">
                <div class="flex justify-end">
                    <input
                        type="text"
                        wire:model.debounce.300ms="search"
                        placeholder="{{ __('Search by code') }}"
                        class="w-full md:w-64 px-4 py-2 text-base border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="overflow-x-auto ">
                <table class="w-full">
                    <thead class="bg-gray-50 border">
                        <tr>
                            <th class="p-4 text-left border-b">{{ __('Code') }}</th>
                            <th class="p-4 text-left border-b">{{ __('Name') }}</th>
                            <th class="p-4 text-left border-b">{{ __('Email') }}</th>
                            <th class="p-4 text-left border-b">{{ __('Phone') }}</th>
                            <th class="p-4 text-left border-b"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr class="hover:bg-gray-50">
                                <td class="p-4 border-b">{{$student->code}}</td>
                                <td class="p-4 border-b">{{$student->name}} {{$student->lastname}}</td>
                                <td class="p-4 border-b">{{$student->email}}</td>
                                <td class="p-4 border-b">{{$student->phone}}</td>
                                <td class="p-4 border-b">
                                    <button
                                        wire:click="showStudentDetail({{ $student->id }})"
                                        class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">{{__('See more')}}</button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="my-2 mx-4">
                    <div class="flex justify-end">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($selectedStudentId)
        <livewire:student-detail :studentId="$selectedStudentId" />
    @endif
</div>
