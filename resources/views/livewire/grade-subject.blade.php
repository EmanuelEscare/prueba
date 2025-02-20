<div>
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-5 rounded shadow-lg w-4/12" wire:key="subject-detail-modal-{{ $subject->id }}">
            <h1 class="text-lg font-bold">{{$subject->name}} - {{$student->name}} {{$student->lastname}}</h1>
            <hr>
            <br>
            <form wire:submit.prevent="save">
                <div class="mb-4">
                    <label for="grade" class="block text-sm font-medium text-gray-700">{{__('Grades')}}</label>
                    <input type="number" id="grade" wire:model="grade" min="1" max="100" 
                        class="mt-1 block w-full p-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" />
        
                    @error('grade')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
        
                <button type="submit" 
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Guardar
                </button>
            </form>
            <br>
            <div class="text-center">
                <button
                    wire:click="$emit('closeModal')"
                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                        {{__('Close')}}
                </button>

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
        </div>
    </div>
</div>