<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::group(['middleware' => 'auth:api'], function () {

    Route::group(['prefix' => 'lead'], function () {
        Route::post('create', [LeadController::class, 'create'])->name('create');
        Route::post('destroy', [LeadController::class, 'destroy'])->name('destroy');
        Route::post('restore', [LeadController::class, 'restore'])->name('restore');
        Route::post('force-delete', [LeadController::class, 'forceDelete'])->name('force-delete');
    });

    Route::group(['prefix' => 'attribute'], function () {
        Route::get('/', [AttributeController::class, 'index'])->name('index');
        Route::post('create', [AttributeController::class, 'create'])->name('create');
        Route::post('update', [AttributeController::class, 'update'])->name('update');
        Route::get('show/{id}', [AttributeController::class, 'show'])->name('show');
        Route::post('destroy', [AttributeController::class, 'destroy'])->name('destroy');
    });
});
