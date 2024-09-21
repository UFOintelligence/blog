<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
 return view('admin.dashboard');
})->name('dashboard');

Route::resource('/categories', CategoryController::class)->except('show');
Route::resource('/posts', PostController::class)->except('show');

Route::resource('/roles', RoleController::class)->except('show');
Route::resource('/permission', permissionController::class)->except('show');
