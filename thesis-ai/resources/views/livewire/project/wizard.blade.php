<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 md:p-8">
            <h1 class="text-2xl font-bold mb-6">Create New Project</h1>

            {{-- Step 1: Field and Level --}}
            @if ($currentStep == 1)
                <div class="mb-6">
                    <label for="field" class="block text-sm font-medium text-gray-700">What's your field of study?</label>
                    <input type="text" id="field" wire:model.defer="field" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="e.g., Computer Science">
                    @error('field') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-6">
                    <label for="level" class="block text-sm font-medium text-gray-700">What's your academic level?</label>
                    <select id="level" wire:model.defer="level" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Select a level</option>
                        <option value="BSc">Bachelor's (BSc)</option>
                        <option value="MSc">Master's (MSc)</option>
                        <option value="PhD">Doctorate (PhD)</option>
                    </select>
                    @error('level') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            @endif

            {{-- Step 2: Word Count and Deadline --}}
            @if ($currentStep == 2)
                <div wire:loading wire:target="nextStep">
                    <p>Generating title suggestions...</p>
                </div>
                <div wire:loading.remove wire:target="nextStep">
                    <div class="mb-6">
                        <label for="wordcount_goal" class="block text-sm font-medium text-gray-700">Word Count Goal</label>
                        <input type="number" id="wordcount_goal" wire:model.defer="wordcount_goal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="1000" step="500">
                        @error('wordcount_goal') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-6">
                        <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                        <input type="date" id="deadline" wire:model.defer="deadline" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @error('deadline') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endif

            {{-- Step 3: Title --}}
            @if ($currentStep == 3)
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">Project Title</label>
                    <p class="text-sm text-gray-500 mb-2">We've suggested a few titles based on your input. Feel free to edit your favorite or write your own.</p>
                    @foreach ($titleSuggestions as $suggestion)
                        <button type="button" wire:click="$set('title', '{{ $suggestion }}')" class="block w-full text-left p-2 mb-2 rounded-md {{ $title === $suggestion ? 'bg-blue-100 border-blue-500' : 'bg-gray-50 border-gray-200' }} border">
                            {{ $suggestion }}
                        </button>
                    @endforeach
                    <textarea id="title" wire:model.defer="title" class="mt-4 block w-full rounded-md border-gray-300 shadow-sm" rows="2"></textarea>
                    @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            @endif

            {{-- Navigation Buttons --}}
            <div class="flex justify-between items-center mt-8">
                <div>
                    @if ($currentStep > 1)
                        <button type="button" wire:click="previousStep" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            Back
                        </button>
                    @endif
                </div>
                <div>
                    @if ($currentStep < 3)
                        <button type="button" wire:click="nextStep" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Next
                        </button>
                    @else
                        <button type="button" wire:click="save" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Create Project
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
