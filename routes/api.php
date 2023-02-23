<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\AppointmentController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register'])->name('register.users');
Route::group(['middleware' => ['auth:sanctum']], function(){
   // Route::get('user-profile', [AuthController::class, 'userProfile']);
    Route::post('logout', [AuthController::class, 'logout']);
    
    
    Route::get('users', [AuthController::class, 'allUsers'])->name('show.users');
    
    //Clientes
    Route::prefix('clients')
    ->name('clients.')
    ->group(function(){
        Route::get('/', [ClientController::class, 'index'])->name('index.clients');
        Route::post('/', [ClientController::class, 'store'])->name('store.clients');
        Route::put('/{client}', [ClientController::class, 'update'])->name('update.clients');
        Route::get('/{client}', [ClientController::class, 'show'])->name('show.clients');
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy.clients');
    });

    //Salones
    Route::prefix('branches')
    ->name('branches.')
    ->group(function(){
        Route::get('/', [BranchController::class, 'index'])->name('index.branches');
        Route::post('/', [BranchController::class, 'store'])->name('store.branches');
        Route::put('/{branches}', [BranchController::class, 'update'])->name('update.branches');
        Route::get('/{branches}', [BranchController::class, 'show'])->name('show.branches');
        Route::delete('/{branches}', [BranchController::class, 'destroy'])->name('destroy.branches');
    });    

    //Citas
    Route::prefix('appointments')
    ->name('appointments.')
    ->group(function(){
        Route::get('/', [AppointmentController::class, 'index'])->name('index.appointments');
        Route::post('/', [AppointmentController::class, 'store'])->name('store.appointments');
        Route::put('/{appointments}', [AppointmentController::class, 'update'])->name('update.appointments');
        Route::get('/{appointments}', [AppointmentController::class, 'show'])->name('show.appointments');
        Route::delete('/{appointments}', [AppointmentController::class, 'destroy'])->name('destroy.appointments');
    });
});








