<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lifetime Ban</h2>
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
                    <h3 class="text-xl font-semibold text-slate-900">Lifetime Ban Directory</h3>
                    <p class="mt-1 text-sm text-slate-500">Manage your lifetime ban records.</p>
                </div>
                <a href="{{ route('suppliers.create') }}" class="rounded-2xl bg-amber-600 px-4 py-2 text-sm font-semibold text-white hover:bg-amber-700">Add Lifetime Ban</a>
            </div>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                @if ($suppliers->isEmpty())
                    <div class="p-6 text-center text-sm text-slate-500">No lifetime ban records found. Add a lifetime ban to get started.</div>
                @else
                    <div class="space-y-4 p-4 sm:hidden">
                        @foreach ($suppliers as $supplier)
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 shadow-sm">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">{{ $supplier->name }}</p>
                                        <p class="text-sm text-slate-500">{{ $supplier->phone }}</p>
                                    </div>
                                    <span class="text-xs font-semibold uppercase tracking-wide text-slate-500">ID {{ $supplier->id }}</span>
                                </div>
                                <div class="mt-4 text-sm text-slate-700 space-y-2">
                                    <div><span class="font-medium">Email:</span> {{ $supplier->email }}</div>
                                    <div><span class="font-medium">Address:</span> {{ $supplier->address }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="hidden sm:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Address</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $supplier->id }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $supplier->name }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $supplier->phone }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $supplier->email }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $supplier->address }}</td>
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
