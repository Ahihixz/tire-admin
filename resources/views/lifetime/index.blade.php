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

            <div class="mb-6 flex flex-col gap-4 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:flex-row md:items-center md:justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-slate-900">Lifetime Overview</h3>
                    <p class="mt-1 text-sm text-slate-500">Track tire lifetime data and status.</p>
                </div>
                <a href="{{ route('lifetimes.create') }}" class="rounded-2xl bg-purple-700 px-4 py-3 text-sm font-semibold text-white hover:bg-purple-800">Tambah Lifetime</a>
            </div>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                @if ($lifetimes->isEmpty())
                    <div class="p-6 text-center text-sm text-slate-500">No lifetime records found. Add lifetime data to get started.</div>
                @else
                    <div class="space-y-4 p-4 sm:hidden">
                        @foreach ($lifetimes as $lifetime)
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 shadow-sm">
                                <div class="flex items-center justify-between gap-3">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">{{ $lifetime->tire->tire_code ?? 'N/A' }}</p>
                                        <p class="text-sm text-slate-500">{{ $lifetime->tire->brand ?? 'N/A' }}</p>
                                    </div>
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-700">{{ $lifetime->status }}</span>
                                </div>
                                <div class="mt-4 grid gap-2 text-sm text-slate-700">
                                    <div class="flex justify-between"><span>ID</span><span>{{ $lifetime->id }}</span></div>
                                    <div class="flex justify-between"><span>Used HM</span><span>{{ $lifetime->used_hm }}</span></div>
                                    <div class="flex justify-between"><span>Remaining HM</span><span>{{ $lifetime->remaining_hm }}</span></div>
                                </div>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    <a href="{{ route('lifetimes.edit', $lifetime) }}" class="flex-1 rounded-2xl bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-blue-700">Edit</a>
                                    <form action="{{ route('lifetimes.destroy', $lifetime) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus data lifetime ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full rounded-2xl bg-rose-600 px-3 py-2 text-sm font-semibold text-white hover:bg-rose-700">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="hidden sm:block overflow-x-auto">
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
                                @foreach ($lifetimes as $lifetime)
                                    <tr>
                                        <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">{{ $lifetime->id }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->tire->tire_code ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->tire->brand ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->used_hm }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->remaining_hm }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $lifetime->status }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">
                                            <div class="flex flex-wrap gap-2">
                                                <a href="{{ route('lifetimes.edit', $lifetime) }}" class="rounded-lg bg-blue-100 px-3 py-1 font-medium text-blue-700 hover:bg-blue-200">Edit</a>
                                                <form action="{{ route('lifetimes.destroy', $lifetime) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data lifetime ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="rounded-lg bg-rose-100 px-3 py-1 font-medium text-rose-700 hover:bg-rose-200">Delete</button>
                                                </form>
                                            </div>
                                        </td>
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
