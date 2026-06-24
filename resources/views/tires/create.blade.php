<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Tire</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <form action="{{ route('tires.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @if ($errors->any())
                        <div class="rounded-3xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                            <strong class="font-semibold">There are some errors with your submission:</strong>
                            <ul class="mt-2 list-disc space-y-1 pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Tire Code</label>
                            <input name="tire_code" value="{{ old('tire_code') }}" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Brand</label>
                            <input name="brand" value="{{ old('brand') }}" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Size</label>
                            <input name="size" value="{{ old('size') }}" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Status</label>
                            <select name="status" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100">
                                <option value="stock" {{ old('status') === 'stock' ? 'selected' : '' }}>Stock</option>
                                <option value="installed" {{ old('status') === 'installed' ? 'selected' : '' }}>Installed</option>
                                <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                <option value="retired" {{ old('status') === 'retired' ? 'selected' : '' }}>Retired</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Quantity</label>
                            <input name="quantity" type="number" min="0" value="{{ old('quantity', 1) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Location</label>
                            <input name="location" value="{{ old('location', 'Warehouse A') }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Running KM</label>
                            <input name="running_km" type="number" min="0" value="{{ old('running_km', 0) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-slate-700">Running Hours</label>
                            <input name="running_hours" type="number" min="0" value="{{ old('running_hours', 0) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" />
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <a href="{{ route('tires.index') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                        <button type="submit" style="background-color:#0ea5e9;border-color:transparent;" class="inline-flex min-w-[11rem] items-center justify-center rounded-2xl px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-sky-500/25 transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 focus:ring-offset-white">Save Tire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
