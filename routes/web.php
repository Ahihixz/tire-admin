<?php

use App\Http\Controllers\AlertController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TireController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('tires', TireController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('maintenances', MaintenanceController::class);

    Route::view('/inventory', 'placeholder', ['title' => 'Inventory', 'subtitle' => 'Inventory data is coming soon.'])->name('inventory');
    Route::view('/transactions', 'placeholder', ['title' => 'Transactions', 'subtitle' => 'Transactions data is coming soon.'])->name('transactions');
    Route::get('/users', function () {
        $users = App\Models\User::latest()->get();
        return view('users.index', compact('users'));
    })->name('users');
    Route::get('/reports', function () {
        $installations = App\Models\Tire::where('status', 'installed')->with('')->latest()->get();
        $maintenances = App\Models\Maintenance::with('tire')->latest()->get();

        return view('reports.index', compact('installations', 'maintenances'));
    })->name('reports');
    Route::get('/alerts', [AlertController::class, 'index'])->name('alerts');
    Route::post('/alerts/{alert}/mark-as-read', [AlertController::class, 'markAsRead'])->name('alerts.mark-as-read');
    Route::post('/alerts/mark-all-as-read', [AlertController::class, 'markAllAsRead'])->name('alerts.mark-all-as-read');
    Route::view('/settings', 'placeholder', ['title' => 'Settings', 'subtitle' => 'Settings are coming soon.'])->name('settings');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
