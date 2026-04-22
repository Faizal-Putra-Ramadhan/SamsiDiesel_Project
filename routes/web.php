<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/track', [PublicController::class, 'track'])->name('track');
Route::get('/track/invoice/{history}', [PublicController::class, 'downloadInvoice'])->name('public.download-invoice');

// Secret Entry for Employees
Route::get('/autosamsi-karyawan', function() {
    return redirect()->route('login');
})->name('secret-login');

Route::middleware(['auth'])->group(function () {
    // Customer Routes
    Route::middleware(['role:customer'])->group(function () {
        Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
        Route::get('/my-vehicles', [CustomerController::class, 'vehicles'])->name('customer.vehicles');
        Route::post('/my-vehicles', [CustomerController::class, 'addVehicle'])->name('customer.add-vehicle');
        Route::get('/service-history', [CustomerController::class, 'history'])->name('customer.history');
        Route::get('/complaints', [CustomerController::class, 'complaints'])->name('customer.complaints');
        Route::post('/complaints', [CustomerController::class, 'storeComplaint'])->name('customer.store-complaint');
    });

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/customers', [AdminController::class, 'customers'])->name('admin.customers');
        Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
        Route::post('/services', [AdminController::class, 'addServiceLog'])->name('admin.add-service');
        Route::patch('/services/{history}', [AdminController::class, 'updateService'])->name('admin.update-service');
        Route::post('/services/{history}/notify', [AdminController::class, 'sendSelesaiNotification'])->name('admin.notify-selesai');
        Route::post('/services/{history}/pay', [AdminController::class, 'confirmPayment'])->name('admin.confirm-payment');
        Route::get('/services/{history}/invoice', [AdminController::class, 'downloadInvoice'])->name('admin.download-invoice');
        Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
        Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.store-product');
        Route::get('/complaints', [AdminController::class, 'complaints'])->name('admin.complaints');
        Route::patch('/complaints/{complaint}', [AdminController::class, 'resolveComplaint'])->name('admin.resolve-complaint');
        Route::post('/whatsapp/reminder', [AdminController::class, 'sendReminder'])->name('admin.send-reminder');
        Route::get('/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export-excel');
    });

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
