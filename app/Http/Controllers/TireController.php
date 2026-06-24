<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Tire;
use Illuminate\Http\Request;

class TireController extends Controller
{
    public function index()
    {
        $tires = Tire::latest()->get();

        return view('tires.index', compact('tires'));
    }

    public function create()
    {
        return view('tires.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tire_code' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'status' => 'required|string|in:stock,installed,maintenance,retired',
            'quantity' => 'required|integer|min:0',
            'location' => 'nullable|string|max:255',
            'running_km' => 'nullable|integer|min:0',
            'running_hours' => 'nullable|integer|min:0',
        ]);

        $tire = Tire::create($validated);

        // Create Alert
        Alert::create([
            'type' => 'tire_added',
            'title' => 'Ban Baru Ditambahkan',
            'message' => "Ban dengan kode '{$tire->tire_code}' dari brand '{$tire->brand}' berhasil ditambahkan ke sistem.",
            'related_model' => 'Tire',
            'related_id' => $tire->id,
        ]);

        return redirect()->route('tires.index')
            ->with('success', 'Tire created successfully');
    }

    public function show(Tire $tire)
    {
        return view('tires.show', compact('tire'));
    }

    public function edit(Tire $tire)
    {
        return view('tires.edit', compact('tire'));
    }

    public function update(Request $request, Tire $tire)
    {
        $validated = $request->validate([
            'tire_code' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'status' => 'required|string|in:stock,installed,maintenance,retired',
            'quantity' => 'required|integer|min:0',
            'location' => 'nullable|string|max:255',
            'running_km' => 'nullable|integer|min:0',
            'running_hours' => 'nullable|integer|min:0',
        ]);

        $tire->update($validated);

        // Create Alert
        Alert::create([
            'type' => 'tire_updated',
            'title' => 'Ban Diperbarui',
            'message' => "Ban dengan kode '{$tire->tire_code}' dari brand '{$tire->brand}' berhasil diperbarui.",
            'related_model' => 'Tire',
            'related_id' => $tire->id,
        ]);

        return redirect()->route('tires.index')
            ->with('success', 'Tire updated successfully');
    }

    public function destroy(Tire $tire)
    {
        $tire->delete();

        return redirect()->route('tires.index')
            ->with('success', 'Tire deleted successfully');
    }
}
