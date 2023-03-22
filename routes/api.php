<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('lead/create', [LeadController::class, 'create'])->name('create');
    Route::post('lead/destroy', [LeadController::class, 'destroy'])->name('destroy');
    Route::post('lead/restore', [LeadController::class, 'restore'])->name('restore');
    Route::post('lead/force-delete', [LeadController::class, 'forceDelete'])->name('force-delete');
});
