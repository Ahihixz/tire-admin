<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lifetime Records</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
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
                    <h3 class="text-xl font-semibold text-slate-900">Lifetime Overview</h3>
                    <p class="mt-1 text-sm text-slate-500">Track tire lifetime data and status.</p>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Tire Code</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Brand</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Used HM</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Remaining HM</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse ($lifetimes as $lifetime)
                            <tr>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->id }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->tire->tire_code ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->tire->brand ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->used_hm }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->remaining_hm }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->status }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <a href="{{ route('lifetimes.show', $lifetime) }}" class="rounded-lg bg-slate-100 px-3 py-1 text-slate-700 hover:bg-slate-200">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-sm text-slate-500">No lifetime records found. Add lifetime data to get started.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
