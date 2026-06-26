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
                <a href="{{ route('lifetimes.index') }}" class="rounded-2xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Back to Lifetime List</a>
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

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="hm_current">Current HM</label>
                            <input id="hm_current" name="hm_current" type="number" value="{{ old('hm_current', $lifetime->hm_current) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required />
                            @error('hm_current')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="km_current">Current KM</label>
                            <input id="km_current" name="km_current" type="number" value="{{ old('km_current', $lifetime->km_current) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required />
                            @error('km_current')
                                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="rounded-2xl bg-sky-600 px-6 py-3 text-sm font-semibold text-white hover:bg-sky-700">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
