<x-dashboard-layout>
    <div class="min-h-screen bg-slate-100 px-6 py-8">
        <div class="mx-auto max-w-6xl rounded-[2rem] border border-slate-200 bg-white p-10 shadow-sm">
            <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-semibold text-slate-900">{{ $title }}</h1>
                    <p class="mt-2 text-sm text-slate-500">{{ $subtitle }}</p>
                </div>
                <a href="{{ route('dashboard') }}" class="rounded-3xl bg-sky-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-sky-600">Back to Dashboard</a>
            </div>
            <div class="rounded-[1.75rem] border border-dashed border-slate-300 bg-slate-50 p-12 text-center">
                <p class="text-xl font-semibold text-slate-900">This page is under construction.</p>
                <p class="mt-3 text-sm text-slate-500">The route is connected, and the view is ready to receive your page content.</p>
            </div>
        </div>
    </div>
</x-dashboard-layout>
