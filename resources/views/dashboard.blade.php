<x-dashboard-layout>
    <div id="tms-dashboard" x-data="{ sidebarOpen: false }" class="relative">
        <div x-show="sidebarOpen" x-cloak x-transition.opacity class="fixed inset-0 z-20 bg-slate-950/40 sm:hidden" @click="sidebarOpen = false"></div>
        <aside x-cloak @click.outside="sidebarOpen = false" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="bg-slate-900 text-slate-100 border-r border-slate-800 fixed inset-y-0 left-0 z-30 w-64 transform transition-transform duration-200 ease-in-out sm:static sm:translate-x-0 sm:w-auto sm:min-w-[var(--sidebar-width)] sm:block">
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
                        ['label' => 'Maintenance', 'route' => 'maintenances.index', 'icon' => 'M12 6v6l4 2'],
                        ['label' => 'Users', 'route' => 'users', 'icon' => 'M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z'],
                        ['label' => 'Alerts', 'route' => 'alerts', 'icon' => 'M12 2a7 7 0 0 1 7 7c0 4 3 5 3 5H2s3-1 3-5a7 7 0 0 1 7-7z'],
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

                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="group flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-800/50 text-slate-300 group-hover:bg-slate-700 group-hover:text-slate-100 group-hover:bg-red-500/20 group-hover:text-red-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M16 13v-2H7V8l-5 4 5 4v-3h9zM20 3h-8v2h8v14h-8v2h8a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"/></svg>
                        </span>
                        <span class="text-xs">Logout</span>
                    </button>
                </form>
            </nav>

            <div class="border-t border-slate-700 px-3 py-4">
                <p class="text-xs text-slate-400 mb-2">ADMIN USER</p>
                <p class="text-xs font-semibold text-slate-100">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-400 mt-1">{{ Auth::user()->email }}</p>
            </div>
        </aside>

        <div class="flex-1 flex flex-col bg-slate-50">
            <div class="border-b border-slate-200 bg-white px-4 py-4 shadow-sm flex items-center justify-between gap-4 sm:px-8">
                <div class="flex items-center gap-3">
                    <button type="button" @click="sidebarOpen = !sidebarOpen" class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white p-2 text-slate-700 shadow-sm transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500 sm:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div>
                        <p class="text-xs text-slate-400 mb-1"><a href="#" class="hover:text-slate-600">Home</a> / <span class="text-slate-600">Dashboard</span></p>
                        <h2 class="text-2xl font-bold text-slate-900">Dashboard</h2>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <label class="relative block">
                        <span class="sr-only">Search</span>
                        <input class="rounded-2xl border border-slate-200 bg-slate-50 py-2 pl-10 pr-4 text-sm text-slate-700 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="Search tire, vehicle, supplier" />
                        <span class="pointer-events-none absolute inset-y-0 left-3 inline-flex items-center text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4"><path fill="currentColor" d="M10 4a6 6 0 1 0 0 12 6 6 0 0 0 0-12Zm11.71 17.29-4.82-4.82A8 8 0 1 0 12 20a7.94 7.94 0 0 0 5.48-2.08l4.82 4.82a1 1 0 0 0 1.42-1.42Z"/></svg>
                        </span>
                    </label>

                    <a href="{{ route('alerts') }}" class="relative inline-flex h-10 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-700 shadow-sm px-3 hover:bg-slate-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5"><path fill="currentColor" d="M12 22a2 2 0 0 1-2-2h4a2 2 0 0 1-2 2Zm6-6V9a6 6 0 1 0-12 0v7l-2 2v1h16v-1l-2-2ZM8 9a4 4 0 1 1 8 0v7H8V9Z"/></svg>
                        @if($unreadAlerts > 0)
                            <span class="absolute -top-1 -right-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-xs text-white font-semibold">{{ $unreadAlerts > 9 ? '9+' : $unreadAlerts }}</span>
                        @endif
                    </a>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto space-y-6 p-4 sm:p-8">
                <!-- Alerts Section -->
                @if (session('success'))
                    <x-alert type="success">
                        {{ session('success') }}
                    </x-alert>
                @endif

                @if (session('error'))
                    <x-alert type="error">
                        {{ session('error') }}
                    </x-alert>
                @endif

                @if (session('warning'))
                    <x-alert type="warning">
                        {{ session('warning') }}
                    </x-alert>
                @endif

                @if (session('info'))
                    <x-alert type="info">
                        {{ session('info') }}
                    </x-alert>
                @endif

                <!-- Stats Cards -->
                <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-xs font-medium text-slate-500 mb-2">Total Tires</p>
                                <p class="text-3xl font-bold text-slate-900">{{ number_format($totalTires) }}</p>
                                <p class="mt-2 text-xs text-emerald-600">+12% from last month</p>
                            </div>
                            <div class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>
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

                <!-- Charts and Actions -->
                <div class="grid gap-6 lg:grid-cols-3">
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Tire Status Overview -->
                        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                            <div class="flex items-center justify-between gap-4 mb-4">
                                <div>
                                    <h3 class="text-base font-semibold text-slate-900">Tire Status Overview</h3>
                                    <p class="mt-1 text-xs text-slate-500">Track how your tires are distributed across stock, use, and maintenance.</p>
                                </div>
                                <div class="rounded-full bg-slate-100 px-3 py-1 text-xs text-slate-600">Last updated 2h ago</div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 p-3">
                                    <span class="inline-flex h-3 w-3 rounded-full bg-blue-500 flex-shrink-0"></span>
                                    <div>
                                        <p class="text-xs text-slate-500">In Stock</p>
                                        <p class="text-sm font-semibold text-slate-900">{{ number_format($stockTires) }} ({{ $totalTires ? round($stockTires / $totalTires * 100) : 0 }}%)</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 p-3">
                                    <span class="inline-flex h-3 w-3 rounded-full bg-green-500 flex-shrink-0"></span>
                                    <div>
                                        <p class="text-xs text-slate-500">In Use</p>
                                        <p class="text-sm font-semibold text-slate-900">{{ number_format($installedTires) }} ({{ $totalTires ? round($installedTires / $totalTires * 100) : 0 }}%)</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 p-3">
                                    <span class="inline-flex h-3 w-3 rounded-full bg-amber-500 flex-shrink-0"></span>
                                    <div>
                                        <p class="text-xs text-slate-500">In Maintenance</p>
                                        <p class="text-sm font-semibold text-slate-900">{{ number_format($maintenanceTires) }} ({{ $totalTires ? round($maintenanceTires / $totalTires * 100) : 0 }}%)</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 rounded-lg border border-slate-200 bg-slate-50 p-3">
                                    <span class="inline-flex h-3 w-3 rounded-full bg-red-500 flex-shrink-0"></span>
                                    <div>
                                        <p class="text-xs text-slate-500">Retired</p>
                                        <p class="text-sm font-semibold text-slate-900">{{ number_format($retiredTires) }} ({{ $totalTires ? round($retiredTires / $totalTires * 100) : 0 }}%)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Brand and Size Charts -->
                        <div class="grid gap-6 lg:grid-cols-2">
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
                            @endphp

                            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                                <div class="flex items-center justify-between gap-4 mb-4">
                                    <div>
                                        <h3 class="text-base font-semibold text-slate-900">Tires by Brand</h3>
                                        <p class="mt-1 text-xs text-slate-500">Top brands in your fleet.</p>
                                    </div>
                                    <span class="rounded-full bg-slate-100 px-2 py-1 text-xs text-slate-600">Last 30 days</span>
                                </div>
                                <div style="height:200px;">
                                    <canvas id="brandChart"></canvas>
                                </div>
                            </div>

                            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                                <div class="flex items-center justify-between gap-4 mb-4">
                                    <div>
                                        <h3 class="text-base font-semibold text-slate-900">Tires by Size</h3>
                                        <p class="mt-1 text-xs text-slate-500">Most popular sizes in stock.</p>
                                    </div>
                                    <span class="rounded-full bg-slate-100 px-2 py-1 text-xs text-slate-600">Current</span>
                                </div>
                                <div style="height:200px;">
                                    <canvas id="sizeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar: Quick Actions & Alerts -->
                    <div class="space-y-6">
                        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                            <h3 class="text-base font-semibold text-slate-900 mb-4">Quick Actions</h3>
                            <div class="grid gap-2">
                                <a href="{{ route('tires.create') }}" class="inline-flex items-center justify-between rounded-lg bg-blue-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2Z"/></svg>
                                    <span>Add Tire</span>
                                </a>
                                <a href="{{ route('vehicles.create') }}" class="inline-flex items-center justify-between rounded-lg bg-green-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2Z"/></svg>
                                    <span>Add Vehicle</span>
                                </a>
                                <a href="{{ route('suppliers.create') }}" class="inline-flex items-center justify-between rounded-lg bg-amber-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-amber-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2Z"/></svg>
                                    <span>Add Supplier</span>
                                </a>
                                <a href="{{ route('maintenances.create') }}" class="inline-flex items-center justify-between rounded-lg bg-red-500 px-4 py-3 text-sm font-semibold text-white transition hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2Z"/></svg>
                                    <span>New Maintenance</span>
                                </a>
                            </div>
                        </div>

                        <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                            <div class="flex items-center justify-between gap-4 mb-4">
                                <h3 class="text-base font-semibold text-slate-900">Low Stock Alert</h3>
                                <a href="{{ route('tires.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">View All</a>
                            </div>
                            <div class="space-y-3">
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
                                    <div class="flex items-center gap-3 rounded-lg border border-slate-200 p-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-100 text-slate-600 flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs font-semibold text-slate-900">{{ $item->brand }} {{ $item->size }}</p>
                                            <p class="text-xs text-slate-500 mt-0.5">{{ $item->tire_code }}</p>
                                        </div>
                                        <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-semibold text-red-600 flex-shrink-0">Low Stock</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Tires Table -->
                <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-4 mb-4">
                        <div>
                            <h3 class="text-base font-semibold text-slate-900">Recent Tires</h3>
                            <p class="mt-1 text-xs text-slate-500">Latest entries added to the system.</p>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-slate-500">
                            <span>Updated just now</span>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm text-slate-600">
                            <thead class="border-b border-slate-200 bg-slate-50 text-slate-700">
                                <tr>
                                    <th class="px-4 py-3 text-xs font-semibold">ID</th>
                                    <th class="px-4 py-3 text-xs font-semibold">Tire Code</th>
                                    <th class="px-4 py-3 text-xs font-semibold">Brand</th>
                                    <th class="px-4 py-3 text-xs font-semibold">Size</th>
                                    <th class="px-4 py-3 text-xs font-semibold">Status</th>
                                    <th class="px-4 py-3 text-xs font-semibold">Location</th>
                                    <th class="px-4 py-3 text-xs font-semibold">Date Added</th>
                                    <th class="px-4 py-3 text-xs font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($recentTires as $tire)
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-4 py-3 text-sm font-medium text-slate-900">{{ $tire->id }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $tire->tire_code ?? '—' }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $tire->brand ?? '—' }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $tire->size ?? '—' }}</td>
                                        <td class="px-4 py-3">
                                            @php
                                                $statusLabel = $tire->status ? ucwords(str_replace(['_', '-'], ' ', $tire->status)) : 'Unknown';
                                                $statusClass = match ($tire->status) {
                                                    'stock' => 'bg-blue-100 text-blue-700',
                                                    'installed' => 'bg-green-100 text-green-700',
                                                    'maintenance' => 'bg-amber-100 text-amber-700',
                                                    'retired' => 'bg-red-100 text-red-700',
                                                    default => 'bg-slate-100 text-slate-700',
                                                };
                                            @endphp
                                            <span class="inline-flex rounded-full px-2 py-1 text-xs font-semibold {{ $statusClass }}">{{ $statusLabel }}</span>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-slate-500">{{ $tire->location ?? 'Warehouse A' }}</td>
                                        <td class="px-4 py-3 text-sm text-slate-500">{{ $tire->created_at ? $tire->created_at->format('M d, Y') : '—' }}</td>
                                        <td class="px-4 py-3 space-x-1">
                                            <a href="{{ route('tires.show', $tire) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M12 5a7 7 0 1 1 0 14 7 7 0 0 1 0-14Zm0 2a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 2a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z"/></svg>
                                            </a>
                                            <a href="{{ route('tires.edit', $tire) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M5 18.25V21h2.75l8.23-8.23-2.75-2.75L5 18.25Zm11.04-9.29 2.75 2.75 1.71-1.71-2.75-2.75-1.71 1.71Z"/></svg>
                                            </a>
                                            <form action="{{ route('tires.destroy', $tire) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor"><path d="M6 7h12v13H6V7Zm3-4h6v2H9V3Zm10 4H5v14h14V7Z"/></svg>
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
        // Brand Chart
        const brandCtx = document.getElementById('brandChart');
        if (brandCtx) {
            const brandLabels = @json($brandDistribution->pluck('brand'));
            const brandData = @json($brandDistribution->pluck('count'));
            new Chart(brandCtx, {
                type: 'bar',
                data: {
                    labels: brandLabels,
                    datasets: [{
                        label: 'Count',
                        data: brandData,
                        backgroundColor: '#3b82f6',
                        borderRadius: 6,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, grid: { color: '#e2e8f0' }, ticks: { font: { size: 12 } } },
                        x: { grid: { display: false }, ticks: { font: { size: 12 } } }
                    }
                }
            });
        }

        // Size Chart (pie)
        const sizeCtx = document.getElementById('sizeChart');
        if (sizeCtx) {
            const sizeLabels = @json($sizeDistribution->pluck('size'));
            const sizeData = @json($sizeDistribution->pluck('count'));
            new Chart(sizeCtx, {
                type: 'pie',
                data: {
                    labels: sizeLabels,
                    datasets: [{
                        data: sizeData,
                        backgroundColor: ['#3b82f6', '#10b981', '#f97316', '#f59e0b', '#8b5cf6'],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'right', labels: { font: { size: 12 }, padding: 12 } } }
                }
            });
        }
    });
</script>
