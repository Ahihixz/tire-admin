<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Supplier</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-6">
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
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Supplier Name</label>
                        <input name="name" value="{{ old('name') }}" required class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-100" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Phone</label>
                        <input name="phone" value="{{ old('phone') }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-100" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                        <input name="email" type="email" value="{{ old('email') }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-100" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-slate-700">Address</label>
                        <textarea name="address" rows="3" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-100">{{ old('address') }}</textarea>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <a href="{{ route('suppliers.index') }}" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                        <button type="submit" class="rounded-2xl bg-amber-600 px-6 py-3 text-sm font-semibold text-white hover:bg-amber-700">Save Supplier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
