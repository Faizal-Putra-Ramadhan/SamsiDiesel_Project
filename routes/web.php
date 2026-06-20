<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/services', [PublicController::class, 'services'])->name('services');
Route::get('/services/diesel', [PublicController::class, 'dieselService'])->name('services.diesel');
Route::get('/services/gasoline', [PublicController::class, 'gasolineService'])->name('services.gasoline');
Route::get('/services/bubut', [PublicController::class, 'bubutService'])->name('services.bubut');
Route::get('/services/bodyrepair', [PublicController::class, 'bodyRepairService'])->name('services.bodyrepair');
Route::get('/gallery', [PublicController::class, 'gallery'])->name('gallery');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/track', [PublicController::class, 'track'])->middleware('throttle:20,1')->name('track');
Route::get('/track/invoice/{history}', [PublicController::class, 'downloadInvoice'])->middleware('signed')->name('public.download-invoice');

// Secret Entry for Employees
Route::get('/autosamsi-karyawan', function() {
    return redirect()->route('login');
})->name('secret-login');

Route::middleware(['auth'])->group(function () {
    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/customers', [AdminController::class, 'customers'])->name('admin.customers');
        Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
        Route::post('/services', [AdminController::class, 'addServiceLog'])->name('admin.add-service');
        Route::patch('/services/{history}', [AdminController::class, 'updateService'])->name('admin.update-service');
        Route::patch('/services/{history}/details', [AdminController::class, 'updateServiceDetails'])->name('admin.update-service-details');
        Route::post('/services/{history}/notify', [AdminController::class, 'sendSelesaiNotification'])->name('admin.notify-selesai');
        Route::post('/services/{history}/pay', [AdminController::class, 'confirmPayment'])->name('admin.confirm-payment');
        Route::get('/services/{history}/invoice', [AdminController::class, 'downloadInvoice'])->name('admin.download-invoice');
        Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
        Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.store-product');
        Route::delete('/products/{product}', [AdminController::class, 'destroyProduct'])->name('admin.destroy-product');
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
