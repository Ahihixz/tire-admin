<x-dashboard-layout>
    <div id="tms-dashboard">
        <aside class="bg-slate-900 text-slate-100 border-r border-slate-800">
            <div class="px-4 py-5 border-b border-slate-700">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-2xl bg-white/15 flex items-center justify-center text-blue-300 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path fill="currentColor" d="M12 2c-4.97 0-9 4.03-9 9 0 4.5 3.05 8.25 7.12 8.9l.88-1.86A6.997 6.997 0 0 1 5 11c0-3.87 3.13-7 7-7s7 3.13 7 7c0 1.65-.53 3.17-1.42 4.39l.88 1.86C17.95 19.25 21 15.5 21 11c0-4.97-4.03-9-9-9Zm0 4a5 5 0 0 0-5 5c0 2.76 2.24 5 5 5s5-2.24 5-5a5 5 0 0 0-5-5Z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs text-slate-400 block">Tires</span>
                        <h1 class="text-sm font-semibold leading-tight">Management</h1>
                    </div>
                </div>
            </div>

            <nav class="px-3 py-4 space-y-1 flex-1">
                @php
                    $navItems = [
                        ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'M3 12h18M12 3v18'],
                        ['label' => 'Tires', 'route' => 'tires.index', 'icon' => 'M5 12h14M12 5v14'],
                        ['label' => 'Vehicles', 'route' => 'vehicles.index', 'icon' => 'M5 16V8h14v8H5zm3-4h2v2H8v-2zm0-4h2v2H8V8zm6 0h2v2h-2V8zm0 4h2v2h-2v-2z'],
                        ['label' => 'Suppliers', 'route' => 'suppliers.index', 'icon' => 'M12 2l7 4v6c0 5-4 9-7 10-3-1-7-5-7-10V6l7-4z'],
                        ['label' => 'Lifetime', 'route' => 'lifetimes.index', 'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z'],
                        ['label' => 'Transactions', 'route' => 'transactions', 'icon' => 'M12 6v6l4 2'],
                        ['label' => 'Maintenance', 'route' => 'maintenances.index', 'icon' => 'M12 6v6l4 2'],
                        ['label' => 'Users', 'route' => 'users', 'icon' => 'M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z'],
                        ['label' => 'Reports', 'route' => 'reports', 'icon' => 'M12 2a7 7 0 0 1 7 7'],
                        ['label' => 'Alerts', 'route' => 'alerts', 'icon' => 'M12 2a7 7 0 0 1 7 7c0 4 3 5 3 5H2s3-1 3-5a7 7 0 0 1 7-7z'],
                        ['label' => 'Settings', 'route' => 'settings', 'icon' => 'M12 8v8M8 12h8'],
                    ];
                @endphp

                @foreach ($navItems as $item)
                    <a href="{{ route($item['route']) }}" class="group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition {{ request()->routeIs($item['route']) ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-800/50 text-slate-300 group-hover:bg-slate-700 group-hover:text-slate-100 {{ request()->routeIs($item['route']) ? 'bg-blue-500/20 text-blue-200' : '' }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-4 w-4">
                                <path d="{{ $item['icon'] }}" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="text-xs">{{ $item['label'] }}</span>
                    </a>
                @endforeach

            </nav>

            <div class="border-t border-slate-700 px-3 py-4">
                <p class="text-xs text-slate-400 mb-2">ADMIN USER</p>
                <p class="text-xs font-semibold text-slate-100">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-400 mt-1">{{ Auth::user()->email }}</p>
            </div>
        </aside>

        <div class="flex-1 flex flex-col">
            <div class="border-b border-slate-200 bg-white px-8 py-4 shadow-sm">
                <div class="flex flex-col gap-3 xl:flex-row xl:items-center xl:justify-between">
                    <div>
                        <p class="text-xs text-slate-400 mb-1"><a href="#" class="hover:text-slate-600">Home</a> / <span class="text-slate-600">Dashboard</span></p>
                        <h2 class="text-2xl font-bold text-slate-900">Dashboard</h2>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class="relative block w-72">
                            <span class="sr-only">Search</span>
                            <input class="w-full rounded-2xl border border-slate-200 bg-slate-50 py-2.5 pl-12 pr-4 text-sm text-slate-700 outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-100" placeholder="Search tire, vehicle, supplier" />
                            <span class="pointer-events-none absolute inset-y-0 left-4 inline-flex items-center text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4.5 w-4.5"><path fill="currentColor" d="M10 4a6 6 0 1 0 0 12 6 6 0 0 0 0-12Zm11.71 17.29-4.82-4.82A8 8 0 1 0 12 20a7.94 7.94 0 0 0 5.48-2.08l4.82 4.82a1 1 0 0 0 1.42-1.42Z"/></svg>
                            </span>
                        </label>

                        <div class="flex items-center gap-3">
                            <button class="relative inline-flex h-11 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-700 shadow-sm px-3 py-2 hover:bg-slate-50">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5"><path fill="currentColor" d="M12 22a2 2 0 0 1-2-2h4a2 2 0 0 1-2 2Zm6-6V9a6 6 0 1 0-12 0v7l-2 2v1h16v-1l-2-2ZM8 9a4 4 0 1 1 8 0v7H8V9Z"/></svg>
                                <span class="absolute -top-1 -right-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-rose-500 text-xs text-white">5</span>
                            </button>

                            <button class="inline-flex h-11 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-700 shadow-sm px-3 py-2 hover:bg-slate-50">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5"><path fill="currentColor" d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 4H5V6h14v2Z"/></svg>
                            </button>

                            <div class="ml-2">
                                <a href="#" class="inline-flex items-center gap-2 rounded-2xl bg-sky-600 px-4 py-2 text-white font-semibold shadow hover:bg-sky-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"><path fill="currentColor" d="M12 5v14m7-7H5"/></svg>
                                    Add New
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto space-y-6 p-8 bg-slate-50">
                <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-medium text-slate-500 mb-2">Total Tires</p>
                                <p class="text-3xl font-bold text-slate-900">{{ number_format($totalTires) }}</p>
                                <p class="mt-2 text-xs text-emerald-600">+12% from last month</p>
                            </div>
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M12 2c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-xs font-medium text-slate-500 mb-2">In Stock</p>
                        <p class="text-3xl font-bold text-slate-900">{{ number_format($stockTires) }}</p>
                        <p class="mt-2 text-xs text-emerald-600">+8% from last month</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-xs font-medium text-slate-500 mb-2">In Use</p>
                        <p class="text-3xl font-bold text-slate-900">{{ number_format($installedTires) }}</p>
                        <p class="mt-2 text-xs text-rose-500">-5% from last month</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <p class="text-xs font-medium text-slate-500 mb-2">In Maintenance</p>
                        <p class="text-3xl font-bold text-slate-900">{{ number_format($maintenanceTires) }}</p>
                        <p class="mt-2 text-xs text-emerald-600">+3% from last month</p>
                    </div>
                </div>

                <div class="grid gap-6 lg:grid-cols-3">
                    <div class="lg:col-span-2 space-y-6">
                        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <h3 class="text-base font-semibold text-slate-900">Tire Status Overview</h3>
                                    <p class="mt-1 text-xs text-slate-500">Track how your tires are distributed across stock, use, and maintenance.</p>
                                </div>
                                <div class="rounded-full bg-slate-100 px-3 py-1 text-xs text-slate-600">Last updated 2h ago</div>
                            </div>
                            <div class="mt-6 grid gap-6 lg:grid-cols-[auto,1fr] lg:items-center">
                                <div class="flex items-center justify-center">
                                    <div class="relative h-52 w-52">
                                        <canvas id="statusDonut" class="h-52 w-52"></canvas>
                                        <div class="absolute inset-0 flex items-center justify-center text-center pointer-events-none">
                                            <div>
                                                <p class="text-sm text-slate-500">Total</p>
                                                <p class="text-3xl font-semibold text-slate-900">{{ number_format($totalTires) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                                        <span class="inline-flex h-3.5 w-3.5 rounded-full bg-sky-500"></span>
                                        <div>
                                            <p class="text-sm text-slate-500">In Stock</p>
                                            <p class="font-semibold text-slate-900">{{ number_format($stockTires) }} ({{ $totalTires ? round($stockTires / $totalTires * 100) : 0 }}%)</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                                        <span class="inline-flex h-3.5 w-3.5 rounded-full bg-emerald-500"></span>
                                        <div>
                                            <p class="text-sm text-slate-500">In Use</p>
                                            <p class="font-semibold text-slate-900">{{ number_format($installedTires) }} ({{ $totalTires ? round($installedTires / $totalTires * 100) : 0 }}%)</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                                        <span class="inline-flex h-3.5 w-3.5 rounded-full bg-amber-500"></span>
                                        <div>
                                            <p class="text-sm text-slate-500">In Maintenance</p>
                                            <p class="font-semibold text-slate-900">{{ number_format($maintenanceTires) }} ({{ $totalTires ? round($maintenanceTires / $totalTires * 100) : 0 }}%)</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                                        <span class="inline-flex h-3.5 w-3.5 rounded-full bg-rose-500"></span>
                                        <div>
                                            <p class="text-sm text-slate-500">Retired</p>
                                            <p class="font-semibold text-slate-900">{{ number_format($retiredTires) }} ({{ $totalTires ? round($retiredTires / $totalTires * 100) : 0 }}%)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-6 grid-cols-2">
                            @php
                                if ($brandDistribution->isEmpty()) {
                                    $brandDistribution = collect([
                                        (object) ['brand' => 'Bridgestone', 'count' => 380],
                                        (object) ['brand' => 'Michelin', 'count' => 300],
                                        (object) ['brand' => 'Goodyear', 'count' => 180],
                                        (object) ['brand' => 'Dunlop', 'count' => 120],
                                        (object) ['brand' => 'Others', 'count' => 70],
                                    ]);
                                }

                                if ($sizeDistribution->isEmpty()) {
                                    $sizeDistribution = collect([
                                        (object) ['size' => '205/55 R16', 'count' => 320],
                                        (object) ['size' => '195/65 R15', 'count' => 280],
                                        (object) ['size' => '225/45 R17', 'count' => 210],
                                        (object) ['size' => '235/60 R18', 'count' => 160],
                                        (object) ['size' => 'Others', 'count' => 280],
                                    ]);
                                }

                                $maxBrandCount = $brandDistribution->max('count') ?: 1;
                                $maxSizeCount = $sizeDistribution->max('count') ?: 1;
                            @endphp

                            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <h3 class="text-base font-semibold text-slate-900">Tires by Brand</h3>
                                        <p class="mt-1 text-xs text-slate-500">Top brands in your fleet.</p>
                                    </div>
                                    <span class="rounded-full bg-slate-100 px-2 py-1 text-xs text-slate-600">Last 30 days</span>
                                </div>
                                <div class="mt-4 h-40">
                                    <canvas id="brandChart" style="height:160px;"></canvas>
                                </div>
                            </div>

                            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <h3 class="text-base font-semibold text-slate-900">Tires by Size</h3>
                                        <p class="mt-1 text-xs text-slate-500">Most popular sizes in stock.</p>
                                    </div>
                                    <span class="rounded-full bg-slate-100 px-2 py-1 text-xs text-slate-600">Current</span>
                                </div>
                                <div class="mt-4 h-40">
                                    <canvas id="sizeChart" style="height:160px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <h3 class="text-base font-semibold text-slate-900">Quick Actions</h3>
                                    <p class="mt-1 text-xs text-slate-500">Add new items or manage suppliers quickly.</p>
                                </div>
                            </div>
                            <div class="mt-6 grid gap-3">
                                <a href="{{ route('tires.create') }}" class="inline-flex items-center justify-between rounded-3xl border border-slate-200 bg-sky-500 px-4 py-4 text-sm font-semibold text-white transition hover:bg-sky-600">
                                    <span>Add Tire</span>
                                    <span class="rounded-2xl bg-white/15 px-2 py-1">+</span>
                                </a>
                                <a href="{{ route('vehicles.create') }}" class="inline-flex items-center justify-between rounded-3xl border border-slate-200 bg-emerald-500 px-4 py-4 text-sm font-semibold text-white transition hover:bg-emerald-600">
                                    <span>Add Vehicle</span>
                                    <span class="rounded-2xl bg-white/15 px-2 py-1">+</span>
                                </a>
                                <a href="{{ route('suppliers.create') }}" class="inline-flex items-center justify-between rounded-3xl border border-slate-200 bg-amber-500 px-4 py-4 text-sm font-semibold text-white transition hover:bg-amber-600">
                                    <span>Add Supplier</span>
                                    <span class="rounded-2xl bg-white/15 px-2 py-1">+</span>
                                </a>
                                <a href="{{ route('maintenances.create') }}" class="inline-flex items-center justify-between rounded-3xl border border-slate-200 bg-rose-500 px-4 py-4 text-sm font-semibold text-white transition hover:bg-rose-600">
                                    <span>New Maintenance</span>
                                    <span class="rounded-2xl bg-white/15 px-2 py-1">+</span>
                                </a>
                            </div>
                        </div>

                        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <h3 class="text-base font-semibold text-slate-900">Low Stock Alert</h3>
                                    <p class="mt-1 text-xs text-slate-500">Tires that may need restocking soon.</p>
                                </div>
                                <a href="{{ route('tires.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">View All</a>
                            </div>
                            <div class="mt-6 space-y-4">
                                @php
                                    if ($lowStockTires->isEmpty()) {
                                        $stockItems = collect([
                                            (object) ['tire_code' => 'TR-2024-00125', 'brand' => 'Bridgestone', 'size' => '205/55 R16', 'quantity' => 5],
                                            (object) ['tire_code' => 'TR-2024-00124', 'brand' => 'Michelin', 'size' => '195/65 R15', 'quantity' => 8],
                                            (object) ['tire_code' => 'TR-2024-00123', 'brand' => 'Goodyear', 'size' => '225/45 R17', 'quantity' => 6],
                                        ]);
                                    } else {
                                        $stockItems = $lowStockTires;
                                    }
                                @endphp

                                @foreach ($stockItems as $item)
                                    <div class="flex items-center gap-3 rounded-3xl border border-slate-200 p-4">
                                        <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-slate-100 text-slate-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5"><path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 3.86 3.14 7 7 7s7-3.14 7-7c0-3.87-3.13-7-7-7Zm0 12c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5Z"/></svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-slate-900">{{ $item->brand }} {{ $item->size }}</p>
                                            <p class="mt-1 text-sm text-slate-500">{{ $item->tire_code }}</p>
                                        </div>
                                        <div class="rounded-full bg-rose-50 px-3 py-1 text-sm font-semibold text-rose-600">Low Stock</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">Recent Tires</h3>
                            <p class="mt-1 text-sm text-slate-500">Latest entries added to the system.</p>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-500">
                            <span>{{ $recentTires->count() }} entries</span>
                            <span>•</span>
                            <span>Updated just now</span>
                        </div>
                    </div>
                    <div class="mt-6 overflow-x-auto">
                        <table class="min-w-full text-left text-sm text-slate-600">
                            <thead class="border-b border-slate-200 text-slate-700">
                                <tr>
                                    <th class="px-4 py-3 font-semibold">ID</th>
                                    <th class="px-4 py-3 font-semibold">Tire Code</th>
                                    <th class="px-4 py-3 font-semibold">Brand</th>
                                    <th class="px-4 py-3 font-semibold">Size</th>
                                    <th class="px-4 py-3 font-semibold">Status</th>
                                    <th class="px-4 py-3 font-semibold">Location</th>
                                    <th class="px-4 py-3 font-semibold">Date Added</th>
                                    <th class="px-4 py-3 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($recentTires as $tire)
                                    <tr>
                                        <td class="px-4 py-4 font-medium text-slate-900">{{ $tire->id }}</td>
                                        <td class="px-4 py-4">{{ $tire->tire_code ?? '—' }}</td>
                                        <td class="px-4 py-4">{{ $tire->brand ?? '—' }}</td>
                                        <td class="px-4 py-4">{{ $tire->size ?? '—' }}</td>
                                        <td class="px-4 py-4">
                                            @php
                                                $statusLabel = $tire->status ? ucwords(str_replace(['_', '-'], ' ', $tire->status)) : 'Unknown';
                                                $statusClass = match ($tire->status) {
                                                    'stock' => 'bg-sky-100 text-sky-700',
                                                    'installed' => 'bg-emerald-100 text-emerald-700',
                                                    'maintenance' => 'bg-amber-100 text-amber-700',
                                                    'retired' => 'bg-rose-100 text-rose-700',
                                                    default => 'bg-slate-100 text-slate-700',
                                                };
                                            @endphp
                                            <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">{{ $statusLabel }}</span>
                                        </td>
                                        <td class="px-4 py-4 text-slate-500">{{ $tire->location ?? 'Warehouse A' }}</td>
                                        <td class="px-4 py-4 text-slate-500">{{ $tire->created_at ? $tire->created_at->format('M d, Y') : '—' }}</td>
                                        <td class="px-4 py-4 space-x-2">
                                            <a href="{{ route('tires.show', $tire) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"><path fill="currentColor" d="M12 5a7 7 0 1 1 0 14 7 7 0 0 1 0-14Zm0 2a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 2a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z"/></svg>
                                            </a>
                                            <a href="{{ route('tires.edit', $tire) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"><path fill="currentColor" d="M5 18.25V21h2.75l8.23-8.23-2.75-2.75L5 18.25Zm11.04-9.29 2.75 2.75 1.71-1.71-2.75-2.75-1.71 1.71Z"/></svg>
                                            </a>
                                            <form action="{{ route('tires.destroy', $tire) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"><path fill="currentColor" d="M6 7h12v13H6V7Zm3-4h6v2H9V3Zm10 4H5v14h14V7Z"/></svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Status Donut
        const statusCtx = document.getElementById('statusDonut');
        if (statusCtx) {
            new Chart(statusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['In Stock', 'In Use', 'In Maintenance', 'Retired'],
                    datasets: [{
                        data: [{{ $stockTires }}, {{ $installedTires }}, {{ $maintenanceTires }}, {{ $retiredTires }}],
                        backgroundColor: ['#0ea5e9', '#10b981', '#f59e0b', '#ef4444'],
                        hoverOffset: 6,
                        cutout: '70%'
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'right' } } }
            });
        }

        // Brand Chart
        const brandCtx = document.getElementById('brandChart');
        if (brandCtx) {
            const brandLabels = @json($brandDistribution->pluck('brand'));
            const brandData = @json($brandDistribution->pluck('count'));
            new Chart(brandCtx, {
                type: 'bar',
                data: {
                    labels: brandLabels,
                    datasets: [{ label: 'Count', data: brandData, backgroundColor: '#2563eb' }]
                },
                options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
            });
        }

        // Size Chart (pie)
        const sizeCtx = document.getElementById('sizeChart');
        if (sizeCtx) {
            const sizeLabels = @json($sizeDistribution->pluck('size'));
            const sizeData = @json($sizeDistribution->pluck('count'));
            new Chart(sizeCtx, {
                type: 'pie',
                data: { labels: sizeLabels, datasets: [{ data: sizeData, backgroundColor: ['#2563eb','#10b981','#f97316','#f59e0b','#8b5cf6'] }] },
                options: { responsive: true, maintainAspectRatio: false }
            });
        }
    });
</script>
