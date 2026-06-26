<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <style>
            :root{
                --sidebar-width:200px;
                --sidebar-bg:#0f1729;
                --primary-blue:#2563eb;
                --card-radius:1rem;
                --card-border:#e2e8f0;
                --card-shadow:0 1px 3px rgba(0,0,0,0.1);
            }

            * { box-sizing: border-box; }
            [x-cloak] { display: none !important; }
            html,body{
                font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
                background: #f8fafc;
            }

            /* Dashboard Layout */
            #tms-dashboard { display:flex; min-height:100vh; }
            #tms-dashboard aside{
                width:var(--sidebar-width);
                min-width:var(--sidebar-width);
                background: var(--sidebar-bg);
                color:#fff;
                position: sticky;
                top: 0;
                height: 100vh;
                overflow-y: auto;
            }
            #tms-dashboard .flex-1 { flex:1; overflow:hidden; display:flex; flex-direction:column; }
            #tms-dashboard .flex-1 > div:last-child { flex:1; overflow-y:auto; }

            @media (max-width: 767px) {
                #tms-dashboard { flex-direction: column; }
                #tms-dashboard aside {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 260px;
                    min-width: unset;
                    height: 100vh;
                    box-shadow: 8px 0 30px rgba(15,23,41,0.35);
                }
                #tms-dashboard .flex-1 { min-height: 100vh; }
            }
            
            /* Cards */
            #tms-dashboard [class*="rounded-[2rem]"]{
                border-radius:var(--card-radius) !important;
                border:1px solid var(--card-border) !important;
                background:#fff !important;
                box-shadow: var(--card-shadow) !important;
            }
            
            /* Typography */
            #tms-dashboard .text-3xl { font-size:28px; font-weight:600; line-height:1.1; }
            #tms-dashboard .text-lg { font-size:18px; font-weight:600; }
            #tms-dashboard .text-sm { font-size:13px; line-height:1.5; }
            #tms-dashboard .text-xs { font-size:11px; text-transform:uppercase; letter-spacing:0.5px; }
            
            /* Buttons */
            #tms-dashboard a.bg-sky-600, #tms-dashboard button.bg-sky-600{
                background: var(--primary-blue) !important;
                box-shadow: 0 4px 12px rgba(37,99,235,0.25) !important;
            }
            #tms-dashboard a.bg-sky-600:hover, #tms-dashboard button.bg-sky-600:hover{
                background: #1d4ed8 !important;
            }
            
            /* Stats Card Icon */
            #tms-dashboard .inline-flex.h-14.w-14 {
                height:56px;
                width:56px;
                border-radius:12px;
            }
            
            /* Quick Action Buttons */
            #tms-dashboard a[href*="tires.create"],
            #tms-dashboard a[href*="vehicles.create"],
            #tms-dashboard a[href*="suppliers.create"],
            #tms-dashboard a[href*="maintenances.create"]{
                border-radius:12px !important;
                padding:16px !important;
                font-size:14px !important;
            }
            
            /* Table */
            #tms-dashboard table { border-collapse:collapse; }
            #tms-dashboard thead { background:#f1f5f9; }
            #tms-dashboard th { font-size:13px; font-weight:600; padding:12px 16px; text-align:left; }
            #tms-dashboard td { padding:14px 16px; border-bottom:1px solid #e2e8f0; }
            
            /* Low Stock Alert */
            #tms-dashboard .rounded-full.bg-rose-50 {
                background:#fee2e2 !important;
                border-radius:9999px;
                padding:6px 12px;
                font-size:12px;
                font-weight:600;
                color:#dc2626;
            }
            
            /* Chart containers */
            #tms-dashboard canvas { max-width:100%; height:auto; }
            #tms-dashboard #statusDonut { max-height:200px; }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-100 text-slate-900">
        {{ $slot }}
    </body>
</html>
