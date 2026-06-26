<?php

namespace App\Http\Controllers;

use App\Models\Lifetime;
use App\Models\Tire;
use Illuminate\Http\Request;

class LifetimeController extends Controller
{
    /**
     * Menampilkan daftar lifetime semua ban
     */
    public function index()
    {
        $lifetimes = Lifetime::with('tire')->get();

        return view('lifetime.index', compact('lifetimes'));
    }

    /**
     * Tampilkan form pembuatan lifetime baru
     */
    public function create()
    {
        $tires = Tire::orderBy('tire_code')->get();

        return view('lifetime.create', compact('tires'));
    }

    /**
     * Simpan data lifetime baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'tire_id' => 'required|exists:tires,id',
            'hm_install' => 'required|numeric|min:0',
            'hm_current' => 'required|numeric|min:0',
            'km_install' => 'nullable|numeric|min:0',
            'km_current' => 'nullable|numeric|min:0',
            'max_lifetime_hm' => 'nullable|numeric|min:1',
            'max_lifetime_km' => 'nullable|numeric|min:1',
            'average_hm_per_day' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        Lifetime::create([
            'tire_id' => $request->tire_id,
            'hm_install' => $request->hm_install,
            'hm_current' => $request->hm_current,
            'km_install' => $request->km_install ?? 0,
            'km_current' => $request->km_current ?? 0,
            'max_lifetime_hm' => $request->max_lifetime_hm ?? 10000,
            'max_lifetime_km' => $request->max_lifetime_km ?? 300000,
            'average_hm_per_day' => $request->average_hm_per_day ?? 0,
            'notes' => $request->notes,
        ]);

        return redirect()->route('lifetimes.index')->with('success', 'Lifetime record berhasil ditambahkan.');
    }

    /**
     * Detail lifetime satu ban
     */
    public function show(Lifetime $lifetime)
    {
        $lifetime->load('tire');

        return view('lifetime.show', compact('lifetime'));
    }

    /**
     * Tampilkan form edit lifetime
     */
    public function edit(Lifetime $lifetime)
    {
        $lifetime->load('tire');

        return view('lifetime.show', compact('lifetime'));
    }

    /**
     * Update data lifetime
     */
    public function update(Request $request, Lifetime $lifetime)
    {
        $request->validate([
            'hm_install' => 'required|numeric|min:0',
            'hm_current' => 'required|numeric|min:0',
            'km_install' => 'nullable|numeric|min:0',
            'km_current' => 'nullable|numeric|min:0',
            'max_lifetime_hm' => 'nullable|numeric|min:1',
            'max_lifetime_km' => 'nullable|numeric|min:1',
            'average_hm_per_day' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        $lifetime->update([
            'hm_install' => $request->hm_install,
            'hm_current' => $request->hm_current,
            'km_install' => $request->km_install ?? 0,
            'km_current' => $request->km_current ?? 0,
            'max_lifetime_hm' => $request->max_lifetime_hm ?? $lifetime->max_lifetime_hm,
            'max_lifetime_km' => $request->max_lifetime_km ?? $lifetime->max_lifetime_km,
            'average_hm_per_day' => $request->average_hm_per_day ?? $lifetime->average_hm_per_day,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('lifetimes.show', $lifetime)
            ->with('success', 'Lifetime berhasil diperbarui.');
    }

    /**
     * Hapus data lifetime
     */
    public function destroy(Lifetime $lifetime)
    {
        $lifetime->delete();

        return redirect()
            ->route('lifetimes.index')
            ->with('success', 'Lifetime record berhasil dihapus.');
    }

    /**
     * Dashboard Lifetime
     */
    public function dashboard()
    {
        $total = Lifetime::count();

        $good = Lifetime::get()->filter(fn ($lifetime) => $lifetime->status === 'GOOD')->count();
        $warning = Lifetime::get()->filter(fn ($lifetime) => $lifetime->status === 'WARNING')->count();
        $critical = Lifetime::get()->filter(fn ($lifetime) => $lifetime->status === 'CRITICAL')->count();
        $scrap = Lifetime::get()->filter(fn ($lifetime) => $lifetime->status === 'SCRAP')->count();

        return view('lifetime.dashboard', compact(
            'total',
            'good',
            'warning',
            'critical',
            'scrap'
        ));
    }

    /**
     * API JSON Lifetime
     */
    public function api()
    {
        $lifetimes = Lifetime::with('tire')->get()->map(function ($lifetime) {
            return [
                'id' => $lifetime->id,
                'tire_id' => $lifetime->tire_id,
                'tire_code' => $lifetime->tire->tire_code ?? null,
                'brand' => $lifetime->tire->brand ?? null,
                'used_hm' => $lifetime->used_hm,
                'remaining_hm' => $lifetime->remaining_hm,
                'lifetime_percentage' => $lifetime->lifetime_percentage,
                'status' => $lifetime->status,
                'remaining_days' => $lifetime->remaining_days,
                'estimated_scrap_date' => $lifetime->estimated_scrap_date,
            ];
        });

        return response()->json($lifetimes);
    }
}