<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
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
        Route::get('{forum:slug}/edit', [ForumController::class, 'edit'])->name('forums.edit');
        Route::patch('{forum:slug}', [ForumController::class, 'update'])->name('forums.update');
        Route::delete('{forum:slug}', [ForumController::class, 'destroy'])->name('forums.destroy');
    });

    Route::post('comments/store/{forum:slug}', [CommentController::class, 'store'])->name('comments.store');
    Route::post('comments/reply/{comment}', [CommentController::class, 'reply'])->name('comments.reply');

    Route::prefix('tags')->group(function(){
        Route::get('/', [TagController::class, 'index'])->name('tags.index');
        Route::post('/', [TagController::class, 'store'])->name('tags.store');
        Route::get('create', [TagController::class, 'create'])->name('tags.create');
        Route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('tags.edit');
        Route::get('{tag:slug}', [TagController::class, 'show'])->name('tags.show');
        Route::patch('{tag:slug}', [TagController::class, 'update'])->name('tags.update');
        Route::delete('{tag:slug}', [TagController::class, 'destroy'])->name('tags.destroy');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('forums/read/{forum:slug}', [ForumController::class, 'show'])->name('forums.show');

Route::get('populars', [ForumController::class, 'populars'])->name('forums.populars');

Route::get('user/profile/{user:name}', [ProfileController::class, 'index'])->name('profile.index');
