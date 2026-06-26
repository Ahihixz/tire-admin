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

            <div class="mb-6 flex flex-col gap-4 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:flex-row md:items-center md:justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-slate-900">Tire Inventory</h3>
                    <p class="mt-1 text-sm text-slate-500">Manage tires in the system.</p>
                </div>
                <a href="{{ route('tires.create') }}" class="rounded-2xl bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700">Add Tire</a>
            </div>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                @if ($tires->isEmpty())
                    <div class="p-6 text-center text-sm text-slate-500">No tires found. Add a tire to get started.</div>
                @else
                    <div class="space-y-4 p-4 sm:hidden">
                        @foreach ($tires as $tire)
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 shadow-sm">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">{{ $tire->tire_code }}</p>
                                        <p class="text-sm text-slate-500">{{ $tire->brand }} • {{ $tire->size }}</p>
                                    </div>
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-700">{{ ucfirst($tire->status) }}</span>
                                </div>
                                <div class="mt-4 grid gap-2 text-sm text-slate-700">
                                    <div class="flex justify-between"><span>Location</span><span>{{ $tire->location }}</span></div>
                                    <div class="flex justify-between"><span>Qty</span><span>{{ $tire->quantity }}</span></div>
                                </div>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    <a href="{{ route('tires.edit', $tire) }}" class="flex-1 rounded-2xl bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-blue-700">Edit</a>
                                    <form action="{{ route('tires.destroy', $tire) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus ban ini?');">
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
                                @foreach ($tires as $tire)
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
