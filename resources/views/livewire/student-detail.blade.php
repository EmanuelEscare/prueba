<div>
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-5 rounded shadow-lg w-4/12" wire:key="student-detail-modal-{{ $student->id }}">
            <h1 class="text-lg font-bold">{{__('Información del estudiante')}}</h1>
            <hr>
            <br>
            <p><strong>{{__('Code')}}:</strong> {{ $student->id }}</p>
            <p><strong>{{__('Name')}}:</strong> {{ $student->name }} {{ $student->lastname }}</p>
            <p><strong>{{__('Email')}}:</strong> {{ $student->email }}</p>
            <p><strong>{{__('Phone')}}:</strong> {{ $student->phone }}</p>
            <p><strong>{{__('Address')}}:</strong> {{ $student->address }}</p>
            <p><strong>{{__('Gender')}}:</strong> {{ __($student->gender) }}</p>
            <br>
            <div class="text-center">
                <button
                    wire:click="$emit('closeModal')"
                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                        {{__('Close')}}
                </button>
            </div>
        </div>
    </div>
</div>
