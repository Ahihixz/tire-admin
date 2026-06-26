<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lifetime Detail</h2>
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

            <div class="mb-6 flex flex-col gap-4 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm md:flex-row md:items-center md:justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-slate-900">{{ $lifetime->tire->tire_code ?? 'Lifetime Record' }}</h3>
                    <p class="mt-1 text-sm text-slate-500">{{ $lifetime->tire->brand ?? 'No tire information available' }}</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('lifetimes.index') }}" class="rounded-2xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Back to Lifetime List</a>
                    <form action="{{ route('lifetimes.destroy', $lifetime) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data lifetime ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-2xl bg-rose-600 px-4 py-2 text-sm font-semibold text-white hover:bg-rose-700">Delete Record</button>
                    </form>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h4 class="text-lg font-semibold text-slate-900">Lifetime Summary</h4>
                    <div class="mt-6 space-y-4 text-sm text-slate-700">
                        <div class="flex justify-between border-b border-slate-100 pb-3">
                            <span>Installed HM</span>
                            <span>{{ $lifetime->hm_install }}</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-3">
                            <span>Current HM</span>
                            <span>{{ $lifetime->hm_current }}</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-3">
                            <span>Max Lifetime HM</span>
                            <span>{{ $lifetime->max_lifetime_hm }}</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-3">
                            <span>Used HM</span>
                            <span>{{ $lifetime->used_hm }}</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-3">
                            <span>Remaining HM</span>
                            <span>{{ $lifetime->remaining_hm }}</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-3">
                            <span>Lifetime %</span>
                            <span>{{ $lifetime->lifetime_percentage }}%</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-100 pb-3">
                            <span>Status</span>
                            <span>{{ $lifetime->status }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Estimated Scrap Date</span>
                            <span>{{ $lifetime->estimated_scrap_date ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h4 class="text-lg font-semibold text-slate-900">Update Lifetime</h4>
                    <form action="{{ route('lifetimes.update', $lifetime) }}" method="POST" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="hm_install">Installed HM</label>
                                <input id="hm_install" name="hm_install" type="number" value="{{ old('hm_install', $lifetime->hm_install) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required />
                                @error('hm_install')
                                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="hm_current">Current HM</label>
                                <input id="hm_current" name="hm_current" type="number" value="{{ old('hm_current', $lifetime->hm_current) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required />
                                @error('hm_current')
                                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="km_install">Installed KM</label>
                                <input id="km_install" name="km_install" type="number" value="{{ old('km_install', $lifetime->km_install) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" />
                                @error('km_install')
                                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="km_current">Current KM</label>
                                <input id="km_current" name="km_current" type="number" value="{{ old('km_current', $lifetime->km_current) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" />
                                @error('km_current')
                                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="max_lifetime_hm">Max Lifetime HM</label>
                                <input id="max_lifetime_hm" name="max_lifetime_hm" type="number" min="1" value="{{ old('max_lifetime_hm', $lifetime->max_lifetime_hm) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" />
                                @error('max_lifetime_hm')
                                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-medium text-slate-700" for="max_lifetime_km">Max Lifetime KM</label>
                                <input id="max_lifetime_km" name="max_lifetime_km" type="number" min="1" value="{{ old('max_lifetime_km', $lifetime->max_lifetime_km) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" />
                                @error('max_lifetime_km')
                                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="average_hm_per_day">Average HM per Day</label>
                            <input id="average_hm_per_day" name="average_hm_per_day" type="number" step="0.01" min="0" value="{{ old('average_hm_per_day', $lifetime->average_hm_per_day) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" />
                            @error('average_hm_per_day')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="notes">Notes</label>
                            <textarea id="notes" name="notes" rows="4" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('notes', $lifetime->notes) }}</textarea>
                            @error('notes')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <a href="{{ route('lifetimes.index') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 text-center">Back to List</a>
                            <button type="submit" class="rounded-2xl bg-sky-600 px-6 py-3 text-sm font-semibold text-white hover:bg-sky-700">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
