<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                @if ($users->isEmpty())
                    <div class="p-6 text-center text-sm text-slate-500">No users found.</div>
                @else
                    <div class="space-y-4 p-4 sm:hidden">
                        @foreach ($users as $user)
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 shadow-sm">
                                <div class="flex items-center justify-between gap-3">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">{{ $user->name }}</p>
                                        <p class="text-sm text-slate-500">{{ $user->email }}</p>
                                    </div>
                                    <span class="text-xs font-semibold uppercase tracking-wide text-slate-500">ID {{ $user->id }}</span>
                                </div>
                                <div class="mt-4 text-sm text-slate-700">
                                    <span class="font-medium">Joined:</span> {{ $user->created_at?->format('M d, Y') }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="hidden sm:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Joined</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $user->id }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $user->name }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $user->email }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-500">{{ $user->created_at?->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
