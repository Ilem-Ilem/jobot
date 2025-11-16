<div>
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">Total Users</h2>
                <p class="mt-1 text-3xl font-semibold">{{ $totalUsers }}</p>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">Active Projects</h2>
                <p class="mt-1 text-3xl font-semibold">{{ $activeProjects }}</p>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">AI Words Generated</h2>
                <p class="mt-1 text-3xl font-semibold">{{ $aiWordsGenerated }}</p>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">Revenue</h2>
                <p class="mt-1 text-3xl font-semibold">€{{ $revenue }}</p>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-bold mb-4">Top Universities</h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <ul>
                    @foreach ($topUniversities as $university)
                        <li class="flex justify-between items-center py-2">
                            <span>{{ $university->university }}</span>
                            <span>{{ $university->count }} users</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
