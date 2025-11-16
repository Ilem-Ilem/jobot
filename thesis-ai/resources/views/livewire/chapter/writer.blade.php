<div class="max-w-7xl mx-auto py-12 grid grid-cols-12 gap-8">
    <div class="col-span-8">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 md:p-8">
                @if (session()->has('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif

                <h1 class="text-2xl font-bold mb-2">{{ $chapter->project->title }}</h1>
                <h2 class="text-xl font-semibold mb-6">{{ $chapter->title }}</h2>

                <div class="mb-6">
                    <textarea wire:model="content" rows="20" class="w-full rounded-md border-gray-300 shadow-sm"></textarea>
                </div>

                <div class="flex justify-between items-center">
                    <div>
                        <button type="button" wire:click="aiWriteIntro" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            AI Write Intro
                        </button>
                        <button type="button" wire:click="expandText" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                            Expand Text
                        </button>
                    </div>
                    <div>
                        <button type="button" wire:click="save" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </div>
                </div>
                <div class="text-sm text-gray-500 mt-2">Word Count: {{ str_word_count($content) }}</div>
            </div>
        </div>

        <div class="bg-white shadow-sm sm:rounded-lg mt-8">
            <div class="p-6 md:p-8">
                <h2 class="text-xl font-semibold mb-4">Journal Magic</h2>
                <div class="flex items-center">
                    <input type="text" wire:model.defer="journalUrl" class="w-full rounded-md border-gray-300 shadow-sm" placeholder="Paste a DOI or URL">
                    <button type="button" wire:click="fetchJournal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                        Fetch
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-4">
        <livewire:live-feedback-panel :chapter="$chapter" />
    </div>
</div>
