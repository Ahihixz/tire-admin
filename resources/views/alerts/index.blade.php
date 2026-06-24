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
            <div class="border-b border-slate-200 bg-white px-8 py-4 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs text-slate-400 mb-1"><a href="{{ route('dashboard') }}" class="hover:text-slate-600">Home</a> / <span class="text-slate-600">Alerts</span></p>
                    <h2 class="text-2xl font-bold text-slate-900">Alerts</h2>
                </div>
                <div class="flex items-center gap-2">
                    @if($unreadCount > 0)
                        <form method="POST" action="{{ route('alerts.mark-all-as-read') }}" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex h-10 items-center justify-center rounded-lg border border-blue-200 bg-blue-50 text-blue-600 px-4 hover:bg-blue-100 text-sm font-medium transition">
                                Tandai Semua Dibaca
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-8">
                @if($alerts->count() > 0)
                    <div class="space-y-3">
                        @foreach($alerts as $alert)
                            <div class="rounded-lg border border-slate-200 bg-white p-4 hover:border-slate-300 transition {{ !$alert->is_read ? 'border-blue-200 bg-blue-50' : '' }}">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-1">
                                            <h3 class="text-sm font-semibold text-slate-900">{{ $alert->title }}</h3>
                                            @if(!$alert->is_read)
                                                <span class="inline-flex h-2 w-2 rounded-full bg-blue-600"></span>
                                            @endif
                                        </div>
                                        <p class="text-sm text-slate-600 mb-2">{{ $alert->message }}</p>
                                        <p class="text-xs text-slate-400">{{ $alert->created_at->diffForHumans() }}</p>
                                    </div>
                                    @if(!$alert->is_read)
                                        <form method="POST" action="{{ route('alerts.mark-as-read', $alert) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="inline-flex h-9 items-center justify-center rounded-lg text-blue-600 hover:bg-blue-100 text-sm font-medium transition px-3">
                                                Tandai Dibaca
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $alerts->links() }}
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16 text-slate-300 mb-4">
                            <path fill="currentColor" d="M12 2a7 7 0 0 1 7 7c0 4 3 5 3 5H2s3-1 3-5a7 7 0 0 1 7-7zm0 18a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/>
                        </svg>
                        <p class="text-slate-500 text-center">Tidak ada alert</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-dashboard-layout>
