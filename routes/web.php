<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalisteController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\ReportageController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('reportages.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('reportages', ReportageController::class);
    Route::put('/reportages/{reportage}/up', [ReportageController::class, 'moveUp'])->name('reportages.up');
    Route::put('/reportages/{reportage}/down', [ReportageController::class, 'moveDown'])->name('reportages.down');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('admin')->group(function () {
Route::resource('journalistes', JournalisteController::class)->only(['index', 'destroy']);        Route::resource('categories', CategorieController::class)->parameters(['categories' => 'categorie']);
        Route::resource('editions', EditionController::class);
        Route::put('/editions/{edition}/statut', [EditionController::class, 'updateStatut'])->name('editions.updateStatut');
    });
});

require __DIR__.'/auth.php';