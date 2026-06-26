<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Lifetime Baru</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <form action="{{ route('lifetimes.store') }}" method="POST" class="space-y-6">
                    @csrf

                    @if ($errors->any())
                        <div class="rounded-3xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                            <strong class="font-semibold">Silakan perbaiki kesalahan berikut:</strong>
                            <ul class="mt-2 list-disc space-y-1 pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="tire_id">Tire</label>
                            <select id="tire_id" name="tire_id" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100">
                                <option value="">Pilih ban</option>
                                @foreach ($tires as $tire)
                                    <option value="{{ $tire->id }}" {{ old('tire_id') == $tire->id ? 'selected' : '' }}>{{ $tire->tire_code }} - {{ $tire->brand }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="hm_install">HM Saat Dipasang</label>
                            <input id="hm_install" name="hm_install" type="number" min="0" value="{{ old('hm_install') }}" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="hm_current">HM Sekarang</label>
                            <input id="hm_current" name="hm_current" type="number" min="0" value="{{ old('hm_current') }}" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="km_install">KM Saat Dipasang</label>
                            <input id="km_install" name="km_install" type="number" min="0" value="{{ old('km_install') }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="km_current">KM Sekarang</label>
                            <input id="km_current" name="km_current" type="number" min="0" value="{{ old('km_current') }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="max_lifetime_hm">Max Lifetime HM</label>
                            <input id="max_lifetime_hm" name="max_lifetime_hm" type="number" min="1" value="{{ old('max_lifetime_hm', 10000) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="max_lifetime_km">Max Lifetime KM</label>
                            <input id="max_lifetime_km" name="max_lifetime_km" type="number" min="1" value="{{ old('max_lifetime_km', 300000) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700" for="average_hm_per_day">Average HM per Day</label>
                            <input id="average_hm_per_day" name="average_hm_per_day" type="number" step="0.01" min="0" value="{{ old('average_hm_per_day', 0) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700" for="notes">Catatan</label>
                        <textarea id="notes" name="notes" rows="4" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100">{{ old('notes') }}</textarea>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <a href="{{ route('lifetimes.index') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 text-center">Batal</a>
                        <button type="submit" class="inline-flex min-w-[11rem] items-center justify-center rounded-2xl bg-sky-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-sky-500/25 transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 focus:ring-offset-white">Simpan Lifetime</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
