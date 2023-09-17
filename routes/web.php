<?php

use App\Http\Controllers\ActGestionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\ChargeCompteController;
use App\Http\Controllers\CompagnieController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProfileController;
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

require __DIR__.'/auth.php';


Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

});// end group admin middleware


Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(BrancheController::class)->group(function(){
        Route::get('/all/branches', 'AllBranches')->name('all.branches');
        Route::get('/add/branche', 'AddBranche')->name('add.branche');
        Route::post('/store/branche', 'StoreBranche')->name('store.branche');
        Route::get('/edit/branche/{id}', 'EditBranche')->name('edit.branche');
        Route::post('/update/branche', 'UpdateBranche')->name('update.branche');
        Route::get('/delete/branche/{id}', 'DeleteBranche')->name('delete.branche');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(CompagnieController::class)->group(function(){
        Route::get('/all/compagnies', 'AllCompagnies')->name('all.compagnies');
        Route::get('/add/compagnie', 'AddCompagnie')->name('add.compagnie');
        Route::post('/store/compagnie', 'StoreCompagnie')->name('store.compagnie');
        Route::get('/edit/compagnie/{id}', 'EditCompagnie')->name('edit.compagnie');
        Route::post('/update/compagnie', 'UpdateCompagnie')->name('update.compagnie');
        Route::get('/delete/compagnie/{id}', 'DeleteCompagnie')->name('delete.compagnie');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(ActGestionController::class)->group(function(){
        Route::get('/all/act_gestions', 'AllActGestions')->name('all.act_gestions');
        Route::get('/add/act_gestion', 'AddActGestion')->name('add.act_gestion');
        Route::post('/store/act_gestion', 'StoreActGestion')->name('store.act_gestion');
        Route::get('/edit/act_gestion/{id}', 'EditActGestion')->name('edit.act_gestion');
        Route::post('/update/act_gestion', 'UpdateActGestion')->name('update.act_gestion');
        Route::get('/delete/act_gestion/{id}', 'DeleteActGestion')->name('delete.act_gestion');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(ChargeCompteController::class)->group(function(){
        Route::get('/all/charge_comptes', 'AllChargeComptes')->name('all.charge_comptes');
        Route::get('/add/charge_compte', 'AddChargeCompte')->name('add.charge_compte');
        Route::post('/store/charge_compte', 'StoreChargeCompte')->name('store.charge_compte');
        Route::get('/edit/charge_compte/{id}', 'EditChargeCompte')->name('edit.charge_compte');
        Route::post('/update/charge_compte', 'UpdateChargeCompte')->name('update.charge_compte');
        Route::get('/delete/charge_compte/{id}', 'DeleteChargeCompte')->name('delete.charge_compte');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(ProductionController::class)->group(function(){
        Route::get('/all/productions', 'AllProductions')->name('all.productions');
        Route::get('/filter', 'FilterProduction')->name('filter');
        Route::get('/add/production', 'AddProduction')->name('add.production');
        Route::post('/store/production', 'StoreProduction')->name('store.production');
        Route::get('/edit/production/{id}', 'EditProduction')->name('edit.production');
        Route::post('/update/production/{id}', 'UpdateProduction')->name('update.production');
        Route::get('/delete/production/{id}', 'DeleteProduction')->name('delete.production');
    });
});// end group admin middleware
