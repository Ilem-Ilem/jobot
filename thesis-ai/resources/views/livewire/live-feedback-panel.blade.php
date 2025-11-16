<div class="bg-white shadow-sm sm:rounded-lg" wire:poll.5s="poll">
    <div class="p-6">
        <h2 class="text-xl font-semibold mb-4">Live Feedback Panel</h2>

        <div class="mb-4">
            <h3 class="font-medium text-gray-900">Word Count</h3>
            <p class="mt-1 text-3xl font-semibold">{{ $wordCount }}</p>
        </div>

        <div class="mb-4">
            <h3 class="font-medium text-gray-900">Tone Analysis</h3>
            <button type="button" wire:click="analyzeTone" class="text-blue-500 hover:underline">
                Analyze Tone
            </button>
            @if ($toneAnalysis)
                <p class="mt-2 text-sm text-gray-600">{{ $toneAnalysis }}</p>
            @endif
        </div>
    </div>
</div>
