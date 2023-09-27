<?php

use App\Http\Controllers\ActeDeGestionSinistresAtRdController;
use App\Http\Controllers\ActeGestionDimController;
use App\Http\Controllers\ActGestionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrancheController;
use App\Http\Controllers\BrancheDimController;
use App\Http\Controllers\BranchSinistresAtRdController;
use App\Http\Controllers\ChargeCompteController;
use App\Http\Controllers\ChargeCompteDimController;
use App\Http\Controllers\ChargeCompteSinistresController;
use App\Http\Controllers\CompagnieController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SinistreDimController;
use App\Http\Controllers\SinistresAtRDController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\UserController;
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
    return view('admin.admin_login');
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

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/responsable/login', [ResponsableController::class, 'ResponsableLogin'])->name('responsable.login');

// ========== users routes =============
Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(UserController::class)->group(function(){
        Route::get('/tous/users', 'AllUsers')->name('all.users');
        Route::get('/ajouter/user', 'AddUser')->name('add.user');
        Route::post('/store/user', 'StoreUser')->name('store.user');
        Route::get('/modifier/user/{id}', 'EditUser')->name('edit.user');
        Route::put('/update/user/{id}', 'UpdateUser')->name('update.user');
        Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
    });
});// end group admin middleware


Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

});// end group admin middleware

// responsable controllers

Route::middleware(['auth', 'role:responsable'])->group(function(){
    Route::get('/responsable/dashboard', [ResponsableController::class, 'ResponsableDashboard'])->name('responsable.dashboard');
    Route::get('/responsable/logout', [ResponsableController::class, 'ResponsableLogout'])->name('responsable.logout');
    Route::get('/responsable/profile', [ResponsableController::class, 'ResponsableProfile'])->name('responsable.profile');
    Route::post('/responsable/profile/store', [ResponsableController::class, 'ResponsableProfileStore'])->name('responsable.profile.store');
    Route::get('/responsable/change/password', [ResponsableController::class, 'ResponsableChangePassword'])->name('responsable.change.password');
    Route::post('/responsable/update/password', [ResponsableController::class, 'ResponsableUpdatePassword'])->name('responsable.update.password');

});// end group admin middleware


Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(BrancheController::class)->group(function(){
        Route::get('/all/branches', 'AllBranches')->name('all.branches');
        Route::get('/add/branche', 'AddBranche')->name('add.branche');
        Route::post('/store/branche', 'StoreBranche')->name('store.branche');
        Route::get('/edit/branche/{id}', 'EditBranche')->name('edit.branche');
        Route::post('/update/branche', 'UpdateBranche')->name('update.branche');
        Route::get('/delete/branche/{id}', 'DeleteBranche')->name('delete.branche');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(CompagnieController::class)->group(function(){
        Route::get('/all/compagnies', 'AllCompagnies')->name('all.compagnies');
        Route::get('/add/compagnie', 'AddCompagnie')->name('add.compagnie');
        Route::post('/store/compagnie', 'StoreCompagnie')->name('store.compagnie');
        Route::get('/edit/compagnie/{id}', 'EditCompagnie')->name('edit.compagnie');
        Route::post('/update/compagnie', 'UpdateCompagnie')->name('update.compagnie');
        Route::get('/delete/compagnie/{id}', 'DeleteCompagnie')->name('delete.compagnie');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(ActGestionController::class)->group(function(){
        Route::get('/all/act_gestions', 'AllActGestions')->name('all.act_gestions');
        Route::get('/add/act_gestion', 'AddActGestion')->name('add.act_gestion');
        Route::post('/store/act_gestion', 'StoreActGestion')->name('store.act_gestion');
        Route::get('/edit/act_gestion/{id}', 'EditActGestion')->name('edit.act_gestion');
        Route::post('/update/act_gestion', 'UpdateActGestion')->name('update.act_gestion');
        Route::get('/delete/act_gestion/{id}', 'DeleteActGestion')->name('delete.act_gestion');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(ChargeCompteController::class)->group(function(){
        Route::get('/all/charge_comptes', 'AllChargeComptes')->name('all.charge_comptes');
        Route::get('/add/charge_compte', 'AddChargeCompte')->name('add.charge_compte');
        Route::post('/store/charge_compte', 'StoreChargeCompte')->name('store.charge_compte');
        Route::get('/edit/charge_compte/{id}', 'EditChargeCompte')->name('edit.charge_compte');
        Route::post('/update/charge_compte', 'UpdateChargeCompte')->name('update.charge_compte');
        Route::get('/delete/charge_compte/{id}', 'DeleteChargeCompte')->name('delete.charge_compte');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(ProductionController::class)->group(function(){
        Route::get('/all/productions', 'AllProductions')->name('all.productions');
        Route::get('/filter/productions', 'FilterProduction')->name('filter.productions');
        Route::get('/add/production', 'AddProduction')->name('add.production');
        Route::post('/store/production', 'StoreProduction')->name('store.production');
        Route::get('/edit/production/{id}', 'EditProduction')->name('edit.production');
        Route::post('/update/production/{id}', 'UpdateProduction')->name('update.production');
        Route::get('/delete/production/{id}', 'DeleteProduction')->name('delete.production');
        
        Route::get('/export-filtered-productions', 'ExportProductions')->name('export.filtered.productions');
        Route::get('/reset-production', 'ResetProductionFilter')->name('reset.production');


    });
});// end group admin middleware
Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(BranchSinistresAtRdController::class)->group(function(){
        Route::get('/all/branches_sinistres', 'AllBranchesSinistresAtRd')->name('all.branches.sinistres');
        Route::get('/add/branche_sinistre', 'AddBrancheSinistresAtRd')->name('add.branche.sinistre');
        Route::post('/store/branche_sinistre', 'StoreBrancheSinistresAtRd')->name('store.branche.sinistre');
        Route::get('/edit/branche_sinistre/{id}', 'EditBrancheSinistresAtRd')->name('edit.branche.sinistre');
        Route::post('/update/branche_sinistre', 'UpdateBrancheSinistresAtRd')->name('update.branche.sinistre');
        Route::get('/delete/branche_sinistre/{id}', 'DeleteBrancheSinistresAtRd')->name('delete.branche.sinistre');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(ActeDeGestionSinistresAtRdController::class)->group(function(){
        Route::get('/all/acte_gestion_sinistres', 'AllActeDeGestionSinistresAtRd')->name('all.acte.gestion.sinistres');
        Route::get('/add/acte_gestion_sinistre', 'AddActeDeGestionSinistresAtRd')->name('add.acte.gestion.sinistre');
        Route::post('/store/acte_gestion_sinistre', 'StoreActeDeGestionSinistresAtRd')->name('store.acte.gestion.sinistre');
        Route::get('/edit/acte_gestion_sinistre/{id}', 'EditActeDeGestionSinistresAtRd')->name('edit.acte.gestion.sinistre');
        Route::post('/update/acte_gestion_sinistre', 'UpdateActeDeGestionSinistresAtRd')->name('update.acte.gestion.sinistre');
        Route::get('/delete/acte_gestion_sinistre/{id}', 'DeleteActeDeGestionSinistresAtRd')->name('delete.acte.gestion.sinistre');
    });
});// end group admin middleware
Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(ChargeCompteSinistresController::class)->group(function(){
        Route::get('/all/charge_compte_sinistres', 'AllChargeCompteSinistres')->name('all.charge.compte.sinistres');
        Route::get('/add/charge_compte_sinistre', 'AddChargeCompteSinistre')->name('add.charge.compte.sinistre');
        Route::post('/store/charge_compte_sinistre', 'StoreChargeCompteSinistre')->name('store.charge.compte.sinistre');
        Route::get('/edit/charge_compte_sinistre/{id}', 'EditChargeCompteSinistre')->name('edit.charge.compte.sinistre');
        Route::post('/update/charge_compte_sinistre', 'UpdateChargeCompteSinistre')->name('update.charge.compte.sinistre');
        Route::get('/delete/charge_compte_sinistre/{id}', 'DeleteChargeCompteSinistre')->name('delete.charge.compte.sinistre');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(SinistresAtRDController::class)->group(function(){
        Route::get('/tous/sinistres_at_rd', 'AllSinistres')->name('all.sinistres.at.rd');
        Route::get('/filter/sinistres_at_rd', 'FilterSinistre')->name('filter.sinistres.at.rd');
        Route::get('/ajouter/sinistre_at_rd', 'AddSinistre')->name('add.sinistre.at.rd');
        Route::post('/store/sinistre_at_rd', 'StoreSinistre')->name('store.sinistre.at.rd');
        Route::get('/modifier/sinistre_at_rd/{id}', 'EditSinistre')->name('edit.sinistre.at.rd');
        Route::post('/update/sinistre_at_rd/{id}', 'UpdateSinistre')->name('update.sinistre.at.rd');
        Route::get('/delete/sinistre_at_rd/{id}', 'DeleteSinistre')->name('delete.sinistre.at.rd');
        
        Route::get('/export/filtered-sinistres_at_rd', 'ExportSinistres')->name('export.filtered.sinistres.at.rd');
        Route::get('/reset/sinistre_at_rd', 'ResetSinistreFilter')->name('reset.sinistres.at.rd');


    });
});// end group admin middleware

// les routes de sinistre dim

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(BrancheDimController::class)->group(function(){
        Route::get('/all/branches-sinistre-dim', 'AllBranchesSinistresDim')->name('all.branches.sinistres.dim');
        Route::get('/add/branche-sinistre-dim', 'AddBranchesSinistresDim')->name('add.branche.sinistre.dim');
        Route::post('/store/branche-sinistre-dim', 'StoreBranchesSinistresDim')->name('store.branche.sinistre.dim');
        Route::get('/edit/branche-sinistre-dim/{id}', 'EditBranchesSinistresDim')->name('edit.branche.sinistre.dim');
        Route::post('/update/branche-sinistre-dim', 'UpdateBranchesSinistresDim')->name('update.branche.sinistre.dim');
        Route::get('/delete/branche-sinistre-dim/{id}', 'DeleteBranchesSinistresDim')->name('delete.branche.sinistre.dim');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(ActeGestionDimController::class)->group(function(){
        Route::get('/all/acte-gestion-sinistres-dim', 'AllActeDeGestionSinistresDim')->name('all.acte.gestion.sinistres.dim');
        Route::get('/add/acte-gestion-sinistre-dim', 'AddActeDeGestionSinistreDim')->name('add.acte.gestion.sinistre.dim');
        Route::post('/store/acte-gestion-sinistre-dim', 'StoreActeDeGestionSinistreDim')->name('store.acte.gestion.sinistre.dim');
        Route::get('/edit/acte-gestion-sinistre-dim/{id}', 'EditActeDeGestionSinistreDim')->name('edit.acte.gestion.sinistre.dim');
        Route::post('/update/acte-gestion-sinistre-dim', 'UpdateActeDeGestionSinistreDim')->name('update.acte.gestion.sinistre.dim');
        Route::get('/delete/acte-gestion-sinistre-dim/{id}', 'DeleteActeDeGestionSinistreDim')->name('delete.acte.gestion.sinistre.dim');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(ChargeCompteDimController::class)->group(function(){
        Route::get('/all/charge_compte_dim', 'AllChargeCompteDim')->name('all.charge.compte.sinistres.dim');
        Route::get('/add/charge_compte_dim', 'AddChargeCompteDim')->name('add.charge.compte.sinistre.dim');
        Route::post('/store/charge_compte_dim', 'StoreChargeCompteDim')->name('store.charge.compte.sinistre.dim');
        Route::get('/edit/charge_compte_dim/{id}', 'EditChargeCompteDim')->name('edit.charge.compte.sinistre.dim');
        Route::post('/update/charge_compte_dim', 'UpdateChargeCompteDim')->name('update.charge.compte.sinistre.dim');
        Route::get('/delete/charge_compte_dim/{id}', 'DeleteChargeCompteDim')->name('delete.charge.compte.sinistre.dim');
    });
});// end group admin middleware

Route::middleware(['auth', 'role:responsable'])->group(function(){
    
    Route::controller(SinistreDimController::class)->group(function(){
        Route::get('/all/sinistres_dim', 'AllSinistreDim')->name('all.sinistres.dim');
        Route::get('/filter/sinistres_dim', 'FilterSinistreDim')->name('filter.sinistres.dim');
        Route::get('/add/sinistre_dim', 'AddSinistreDim')->name('add.sinistre.dim');
        Route::post('/store/sinistre_dim', 'StoreSinistreDim')->name('store.sinistre.dim');
        Route::get('/edit/sinistre_dim/{id}', 'EditSinistreDim')->name('edit.sinistre.dim');
        Route::post('/update/sinistre_dim/{id}', 'UpdateSinistreDim')->name('update.sinistre.dim');
        Route::get('/delete/sinistre_dim/{id}', 'DeleteSinistreDim')->name('delete.sinistre.dim');
        
        Route::get('/export_filtered_sinistres', 'ExportSinistreDim')->name('export.filtered.sinistres.dim');
        Route::get('/reset_sinistre_dim', 'ResetSinistreDimFilter')->name('reset.sinistres.dim');


    });
});// end group responsables middleware



// =========================//     les groupe admin middleware

Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(ProductionController::class)->group(function(){
        Route::get('/productions', 'AdminAllProductions')->name('productions');
        Route::get('/filter_productions', 'AdminFilterProduction')->name('admin.filter.productions');
        Route::get('/ajouter_production', 'AdminAddProduction')->name('ajouter.production');
        Route::post('/store_production', 'AdminStoreProduction')->name('admin.store.production');
        Route::get('/modifier_production/{id}', 'AdminEditProduction')->name('admin.edit.production');
        Route::post('/update_production/{id}', 'AdminUpdateProduction')->name('adminupdate.production');
        Route::get('/delete_production/{id}', 'AdminDeleteProduction')->name('admin.delete.production');
        
        Route::get('/exporter_filtre_productions', 'AdminExportProductions')->name('admin.export.filtered.productions');
        Route::get('/reinitialiser_production', 'AdminResetProductionFilter')->name('admin.reset.production');


    });
});// end group admin middleware


Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(SinistreDimController::class)->group(function(){
        Route::get('/sinistres_dim', 'AdminAllSinistreDim')->name('sinistres.dim');
        Route::get('/filter_sinistres_dim', 'AdminFilterSinistreDim')->name('admin.filter.sinistres.dim');
        Route::get('/ajouter_sinistre_dim', 'AdminAddSinistreDim')->name('admin.add.sinistre.dim');
        Route::post('/store/sinistre_dim', 'AdminStoreSinistreDim')->name('admin.store.sinistre.dim');
        Route::get('/modifier_sinistre_dim/{id}', 'AdminEditSinistreDim')->name('admin.edit.sinistre.dim');
        Route::post('/update/sinistre_dim/{id}', 'AdminUpdateSinistreDim')->name('admin.update.sinistre.dim');
        Route::get('/delete/sinistre_dim/{id}', 'AdminDeleteSinistreDim')->name('admin.delete.sinistre.dim');
        
        Route::get('/exporter_filtre_sinistres', 'AdminExportSinistreDim')->name('admin.export.filtered.sinistres.dim');
        Route::get('/reinitialiser_sinistre_dim', 'AdminResetSinistreDimFilter')->name('admin.reset.sinistres.dim');


    });
});// end group admin middleware


Route::middleware(['auth', 'role:admin'])->group(function(){
    
    Route::controller(SinistresAtRDController::class)->group(function(){
        Route::get('/sinistres_at_rd', 'AdminAllSinistres')->name('sinistres.at.rd');
        Route::get('/filter_sinistres_at_rd', 'AdminFilterSinistre')->name('admin.filter.sinistres.at.rd');
        Route::get('/ajouter_sinistre_at_rd', 'AdminAddSinistre')->name('admin.add.sinistre.at.rd');
        Route::post('/store/sinistre_at_rd', 'AdminStoreSinistre')->name('admin.store.sinistre.at.rd');
        Route::get('/modifier_sinistre_at_rd/{id}', 'AdminEditSinistre')->name('admin.edit.sinistre.at.rd');
        Route::post('/update/sinistre_at_rd/{id}', 'AdminUpdateSinistre')->name('admin.update.sinistre.at.rd');
        Route::get('/delete/sinistre_at_rd/{id}', 'AdminDeleteSinistre')->name('admin.delete.sinistre.at.rd');
        
        Route::get('/exporter_filtre_sinistres_at_rd', 'AdminExportSinistres')->name('admin.export.filtered.sinistres.at.rd');
        Route::get('/reinitialiser_sinistre_at_rd', 'AdminResetSinistreFilter')->name('admin.reset.sinistres.at.rd');


    });
});// end group admin middleware


