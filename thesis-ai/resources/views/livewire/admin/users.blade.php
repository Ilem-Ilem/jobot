<div>
    <h1 class="text-2xl font-bold mb-6">Users Management</h1>

    <div class="mb-4">
        <input type="text" wire:model.debounce.300ms="search" class="w-full rounded-md border-gray-300 shadow-sm" placeholder="Search by name or email">
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left">Name</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">University</th>
                        <th class="text-left">Plan</th>
                        <th class="text-left">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->university }}</td>
                            <td>{{ $user->plan }}</td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
