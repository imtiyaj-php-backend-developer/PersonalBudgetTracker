<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetmanagementConroller;
use App\Http\Controllers\PersonaltrackerController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [PersonaltrackerController::class, 'register'])->name('register');
    Route::post('/registers', [PersonaltrackerController::class, 'registerPost'])->name('user.register');
    Route::get('/login', [PersonaltrackerController::class, 'login'])->name('login');
    Route::post('/login', [PersonaltrackerController::class, 'loginPost'])->name('user.login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [PersonaltrackerController::class, 'index']);
    Route::post('/logout', [PersonaltrackerController::class, 'logout'])->name('user.logout');


    //Buddget Tracker Management
    // Route::get('/', [BudgetmanagementConroller::class, 'index'])->name('index');
    Route::get('/form', [PersonaltrackerController::class, 'createUserForm']);
    Route::post('/form', [PersonaltrackerController::class, 'UserForm'])->name('validate.form');
    Route::get('/edit/{id}', [PersonaltrackerController::class, 'edit']);
    Route::post('/update/{id}', [PersonaltrackerController::class, 'update'])->name('update.form');
    Route::post('/delete/{id}', [PersonaltrackerController::class, 'delete'])->name('delete.student');
});
