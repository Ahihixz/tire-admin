<?php

namespace App\Http\Controllers;

use App\Models\Lifetime;
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
     * Detail lifetime satu ban
     */
    public function show($id)
    {
        $lifetime = Lifetime::with('tire')->findOrFail($id);

        return view('lifetime.show', compact('lifetime'));
    }

    /**
     * Update HM dan KM ban
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'hm_current' => 'required|numeric|min:0',
            'km_current' => 'required|numeric|min:0',
        ]);

        $lifetime = Lifetime::findOrFail($id);

        $lifetime->update([
            'hm_current' => $request->hm_current,
            'km_current' => $request->km_current,
        ]);

        return redirect()
            ->route('lifetimes.show', $lifetime)
            ->with('success', 'Lifetime berhasil diperbarui.');
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