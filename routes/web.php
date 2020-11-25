<?php

use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Auth::routes();

Route::get('forums', [ForumController::class, 'index'])->name('forums.index');

Route::middleware('auth')->group(function(){
    Route::prefix('forums')->group(function(){
        Route::get('create', [ForumController::class, 'create'])->name('forums.create');
        Route::post('/', [ForumController::class, 'store'])->name('forums.store');
        Route::get('{forum}/edit', [ForumController::class, 'edit'])->name('forums.edit');
        Route::patch('{forum}', [ForumController::class, 'update'])->name('forums.update');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
