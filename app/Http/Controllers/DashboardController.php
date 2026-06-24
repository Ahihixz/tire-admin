<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Tire;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTires = Tire::count();
        $totalVehicles = Vehicle::count();

        $stockTires = 0;
        $installedTires = 0;
        $maintenanceTires = 0;
        $retiredTires = 0;

        if (Schema::hasColumn('tires', 'status')) {
            $stockTires = Tire::where('status', 'stock')->count();
            $installedTires = Tire::where('status', 'installed')->count();
            $maintenanceTires = Tire::where('status', 'maintenance')->count();
            $retiredTires = Tire::where('status', 'retired')->count();
        }

        $recentTires = Tire::latest()->take(5)->get();

        $brandDistribution = collect();
        if (Schema::hasColumn('tires', 'brand')) {
            $brandDistribution = Tire::select('brand', DB::raw('count(*) as count'))
                ->groupBy('brand')
                ->orderByDesc('count')
                ->get();
        }

        $sizeDistribution = collect();
        if (Schema::hasColumn('tires', 'size')) {
            $sizeDistribution = Tire::select('size', DB::raw('count(*) as count'))
                ->groupBy('size')
                ->orderByDesc('count')
                ->get();
        }

        $lowStockTires = collect();
        if (Schema::hasColumn('tires', 'quantity')) {
            $lowStockTires = Tire::where('quantity', '<=', 10)
                ->orderBy('quantity')
                ->take(3)
                ->get();
        } else {
            $lowStockTires = Tire::latest()->take(3)->get();
        }

        $unreadAlerts = Alert::unread()->count();

        return view('dashboard', compact(
            'totalTires',
            'stockTires',
            'installedTires',
            'maintenanceTires',
            'retiredTires',
            'totalVehicles',
            'recentTires',
            'brandDistribution',
            'sizeDistribution',
            'lowStockTires',
            'unreadAlerts'
        ));
    }
}
