<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Your Projects</h1>
        <a href="{{ route('project.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            New Project
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            {{-- Project list will go here --}}
        </div>
    </div>
</div>
