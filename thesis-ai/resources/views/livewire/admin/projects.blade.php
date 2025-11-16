<div>
    <h1 class="text-2xl font-bold mb-6">Projects Monitor</h1>

    <div class="mb-4">
        <input type="text" wire:model.debounce.300ms="search" class="w-full rounded-md border-gray-300 shadow-sm" placeholder="Search by project title or user name">
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left">Title</th>
                        <th class="text-left">User</th>
                        <th class="text-left">University</th>
                        <th class="text-left">Progress</th>
                        <th class="text-left">Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->user->name }}</td>
                            <td>{{ $project->user->university }}</td>
                            <td>{{ $project->chapters->sum('wordcount') }} / {{ $project->wordcount_goal }} words</td>
                            <td>{{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</div>
