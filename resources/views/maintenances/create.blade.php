<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Maintenance Record</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <form action="{{ route('maintenances.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Tire</label>
                        <select name="tire_id" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                            <option value="">Select tire</option>
                            @foreach ($tires as $tire)
                                <option value="{{ $tire->id }}">{{ $tire->tire_code }} - {{ $tire->brand }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Maintenance Date</label>
                        <input type="date" name="maintenance_date" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Description</label>
                        <textarea name="description" rows="4" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"></textarea>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <a href="{{ route('maintenances.index') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                        <button type="submit" class="rounded-2xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white hover:bg-indigo-700">Save Maintenance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
