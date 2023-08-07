<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\HistoryController;
use App\Http\Controllers\Backend\PenghasilanController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin Route
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    // Profile edit 
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    // Password edit
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    // History route grup 
    Route::controller(HistoryController::class)->group(function () {
        // Route Property
        Route::get('/all/history', 'AllHistory')->name('all.history');
        Route::get('/add/history', 'AddHistory')->name('add.history');
        Route::post('/store/history', 'StoreHistory')->name('store.history');
        Route::get('/edit/history/{id}', 'EditHistory')->name('edit.history');
        Route::post('/update/history', 'UpdateHistory')->name('update.history');
        Route::get('/delete/history/{id}', 'DeleteHistory')->name('delete.history');

        // Excel Import & Export
        Route::get('/import/history/export', 'ExportHistory')->name('export.history');
        Route::get('/import/history/exportlist', 'ExportListHistory')->name('export.listhistory');
        
        Route::get('/import/history/exportpemasukan', 'ExportPemasukanKambing')->name('export.pemasukan');

        Route::get('/import/history/importpemasukan', 'ImportPemasukanKambing')->name('import.pemasukan');
        Route::get('/import/history', 'ImportHistory')->name('import.history');

        Route::post('/import', 'Import')->name('import');
    }); // End group
    
    // Penghasilan route grup 
    Route::controller(PenghasilanController::class)->group(function () {
        // Route Property
        Route::get('/all/penghasilan', 'AllPenghasilan')->name('all.penghasilan');
        Route::get('/add/penghasilan', 'AddPenghasilan')->name('add.penghasilan');
        Route::post('/store/penghasilan', 'StorePenghasilan')->name('store.penghasilan');
        Route::get('/edit/penghasilan/{id}', 'EditPenghasilan')->name('edit.penghasilan');
        Route::post('/update/penghasilan', 'UpdatePenghasilan')->name('update.penghasilan');
        Route::get('/delete/penghasilan/{id}', 'DeletePenghasilan')->name('delete.penghasilan');
        
        Route::get('/export', 'ExportTransaksi')->name('export.transaksi');
    }); // End group


}); // End group  middleware
