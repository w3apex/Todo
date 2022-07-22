<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MultiStepFormController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', FrontendController::class);

Route::group(["middleware" => "auth"], function() {
    Route::get('dashboard', DashboardController::class)->name('dashboard.view');
    
    Route::resource('roles', RoleController::class)->except('show');
    Route::resource('permissions', PermissionController::class)->except('show');
    Route::resource('users', UserController::class)->except('show');
    Route::resource('posts', PostController::class)->except('show');
    Route::resource('images', ImageController::class)->except('show');

    Route::post("profiles/password/update", [ProfileController::class, "passwordUpdate"])->name("profiles.password.update");
    Route::resource('profiles', ProfileController::class)->except(['show','create','store','edit','destroy']);

    Route::resource('multi-step-forms', MultiStepFormController::class)->except('show');
}); 

Auth::routes();

// Route::get('/me', function () {
//     Artisan::call('storage:link');
// });