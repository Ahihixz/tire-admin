<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tires</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Alerts Section -->
            @if (session('success'))
                <div class="mb-6">
                    <x-alert type="success">
                        {{ session('success') }}
                    </x-alert>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6">
                    <x-alert type="error">
                        {{ session('error') }}
                    </x-alert>
                </div>
            @endif

            @if (session('warning'))
                <div class="mb-6">
                    <x-alert type="warning">
                        {{ session('warning') }}
                    </x-alert>
                </div>
            @endif

            @if (session('info'))
                <div class="mb-6">
                    <x-alert type="info">
                        {{ session('info') }}
                    </x-alert>
                </div>
            @endif

            <div class="mb-6 flex items-center justify-between gap-4 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div>
                    <h3 class="text-xl font-semibold text-slate-900">Tire Inventory</h3>
                    <p class="mt-1 text-sm text-slate-500">Manage tires in the system.</p>
                </div>
                <a href="{{ route('tires.create') }}" class="rounded-2xl bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700">Add Tire</a>
            </div>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Code</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Brand</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Size</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Qty</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse ($tires as $tire)
                            <tr>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $tire->id }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $tire->tire_code }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $tire->brand }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $tire->size }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ ucfirst($tire->status) }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $tire->location }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $tire->quantity }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700 space-x-2">
                                    <a href="{{ route('tires.edit', $tire) }}" class="rounded-lg bg-slate-100 px-3 py-1 text-slate-700 hover:bg-slate-200">Edit</a>
                                    <form action="{{ route('tires.destroy', $tire) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg bg-rose-100 px-3 py-1 text-rose-700 hover:bg-rose-200">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-10 text-center text-sm text-slate-500">No tires found. Add a tire to get started.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
