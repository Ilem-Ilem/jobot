<div>
    @if ($message)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Your Projects</h1>
        <a href="{{ route('project.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            New Project
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            @if ($projects->isEmpty())
                <p>You don't have any projects yet.</p>
            @else
                <ul class="divide-y divide-gray-200">
                    @foreach ($projects as $project)
                        <li class="py-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-medium">{{ $project->title }}</h3>
                                    <p class="text-sm text-gray-500">
                                        {{ $project->field }} - {{ $project->level }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-medium">
                                        {{ $project->chapters->sum('wordcount') }} / {{ $project->wordcount_goal }} words
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Deadline: {{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}
                                    </p>
                                    <a href="{{ route('project.export', $project) }}" class="text-blue-500 hover:underline">
                                        Export Thesis
                                    </a>
                                    <a href="{{ route('project.export-pptx', $project) }}" class="text-blue-500 hover:underline ml-4">
                                        Export Seminar
                                    </a>
                                </div>
                            </div>
                            <ul class="mt-4 space-y-2">
                                @foreach ($project->chapters as $chapter)
                                    <li class="flex justify-between items-center">
                                        <a href="{{ route('chapter.writer', $chapter) }}" class="text-blue-500 hover:underline">
                                            {{ $chapter->title }}
                                        </a>
                                        <span class="text-sm text-gray-500">{{ $chapter->wordcount }} words</span>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
