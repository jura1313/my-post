<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRegisteredController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ValidUserController;
use App\Http\Controllers\CategoryController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('well');
});




    Route::get('register', [UserRegisteredController::class, 'create']);

    Route::post('register', [UserRegisteredController::class, 'store']);

    Route::get('login', function() { return view('login');});

    Route::post('login', [UserRegisteredController::class, 'login']);

    Route::get('home', [ContentController::class, 'show']);

    Route::get('/categories/{category:slug}', [ContentController::class, 'categories']);

    Route::get('/author/{author:username}', [ContentController::class, 'author']);

    Route::get('view_post/{post:slug}', [ContentController::class, 'view_post']);


Route::middleware(['auth'=>'checklevel:user,admin'])->group(function () {

    Route::get('my_post', [ContentController::class, 'my_post']);

    Route::get('create', [ContentController::class, 'create']);

    Route::post('create', [ContentController::class, 'store']);

    Route::post('/edit/{id}', [ContentController::class, 'edit']);

    Route::get('/update/{id}', [ContentController::class, 'update']);

    Route::get('/delete/{id}', [ContentController::class, 'delete']);

    Route::get('/delete_content/{id}', [ContentController::class, 'delete_content']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('logout', [UserRegisteredController::class, 'destroy']);
});

Route::middleware(['auth'=>'checklevel:admin'])->group(function () {

    Route::get('all_post', [ContentController::class, 'all_post']);

    Route::get('users', [ValidUserController::class, 'all_users']);

    Route::get('category', [CategoryController::class, 'category']);

    Route::get('users/{id}', [ValidUserController::class, 'delete_user']);

    Route::post('new_category', [CategoryController::class, 'new_category']);



});
