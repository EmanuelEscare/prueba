<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center text-xl m-3">{{__('Registration of a subject')}}</h1>
                    <hr>
                    @can(['view_subject', 'create_subject'])
                        @livewire('student-subject')
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center text-xl m-3">{{__('Subjects added')}}</h1>
                    <hr>
                    @can(['show_subject', 'delete_subject'])
                        @livewire('kardex')
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
