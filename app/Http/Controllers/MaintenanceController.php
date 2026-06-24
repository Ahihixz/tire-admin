<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Maintenance;
use App\Models\Tire;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::with('tire')->latest()->get();

        return view('maintenances.index', compact('maintenances'));
    }

    public function create()
    {
        $tires = Tire::all();

        return view('maintenances.create', compact('tires'));
    }

    public function store(Request $request)
    {
        $maintenance = Maintenance::create($request->all());

        $tire = Tire::find($maintenance->tire_id);

        // Create Alert
        Alert::create([
            'type' => 'maintenance_added',
            'title' => 'Pemeliharaan Baru Dicatat',
            'message' => "Pemeliharaan baru untuk ban '{$tire->tire_code}' telah dicatat pada tanggal " . $maintenance->maintenance_date->format('d-m-Y') . ".",
            'related_model' => 'Maintenance',
            'related_id' => $maintenance->id,
        ]);

        return redirect()->route('maintenances.index');
    }

    public function show(Maintenance $maintenance)
    {
        return view('maintenances.show', compact('maintenance'));
    }

    public function edit(Maintenance $maintenance)
    {
        return view('maintenances.edit', compact('maintenance'));
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $maintenance->update($request->all());

        return redirect()->route('maintenances.index');
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();

        return redirect()->route('maintenances.index');
    }
}
