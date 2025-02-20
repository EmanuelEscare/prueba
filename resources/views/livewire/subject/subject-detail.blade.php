<div>
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-5 rounded shadow-lg w-4/12" wire:key="subject-detail-modal-{{ $subject->id }}">
            <h1 class="text-lg font-bold">{{__('Information of subject')}}</h1>
            <hr>
            <br>
            <p><strong>{{__('Code')}}:</strong> {{ $subject->code }}</p>
            <p><strong>{{__('Name')}}:</strong> {{ $subject->name }}</p>
            <p><strong>{{__('Description')}}:</strong> {{ $subject->description }}</p>
            <p><strong>{{__('Credits')}}:</strong> {{ $subject->credits }}</p>
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
