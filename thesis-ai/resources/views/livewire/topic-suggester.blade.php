<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 md:p-8">
            <h1 class="text-2xl font-bold mb-6">Topic Suggester</h1>

            <div class="mb-6">
                <label for="keywords" class="block text-sm font-medium text-gray-700">Enter some keywords to get started</label>
                <input type="text" id="keywords" wire:model.defer="keywords" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="e.g., AI in healthcare, sustainable energy">
                @error('keywords') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="button" wire:click="getSuggestions" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Get Suggestions
            </button>

            @if (!empty($suggestions))
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Here are some suggestions:</h2>
                    <ul class="space-y-4">
                        @foreach ($suggestions as $suggestion)
                            <li class="p-4 bg-gray-50 rounded-md">{{ $suggestion }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
