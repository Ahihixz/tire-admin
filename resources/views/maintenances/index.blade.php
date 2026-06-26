<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Maintenance</h2>
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
                    <h3 class="text-xl font-semibold text-slate-900">Maintenance Records</h3>
                    <p class="mt-1 text-sm text-slate-500">Track maintenance history for tires.</p>
                </div>
                <a href="{{ route('maintenances.create') }}" class="rounded-2xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Add Maintenance</a>
            </div>

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                @if ($maintenances->isEmpty())
                    <div class="p-6 text-center text-sm text-slate-500">No maintenance records found.</div>
                @else
                    <div class="space-y-4 p-4 sm:hidden">
                        @foreach ($maintenances as $maintenance)
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 shadow-sm">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">{{ $maintenance->tire?->tire_code ?? 'Unknown' }}</p>
                                        <p class="text-sm text-slate-500">{{ $maintenance->maintenance_date?->format('M d, Y') }}</p>
                                    </div>
                                    <span class="text-xs font-semibold uppercase tracking-wide text-slate-500">#{{ $maintenance->id }}</span>
                                </div>
                                <div class="mt-4 text-sm text-slate-700">
                                    {{ \Illuminate\Support\Str::limit($maintenance->description, 100) }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="hidden sm:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Tire</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Description</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                @foreach ($maintenances as $maintenance)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $maintenance->id }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $maintenance->tire?->tire_code ?? 'Unknown' }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ $maintenance->maintenance_date?->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 text-sm text-slate-700">{{ \Illuminate\Support\Str::limit($maintenance->description, 60) }}</td>
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
