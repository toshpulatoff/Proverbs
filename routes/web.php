<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProverbController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\User\UserProverbController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user.proverbs.index');
// });
Route::get('/', [UserProverbController::class, 'index'])->name('user.proverb.index');
Route::get('/proverbs/search', [UserProverbController::class, 'search'])->name('user.proverbs.index');
Route::get('/proverbs/{id}', [UserProverbController::class, 'show'])->name('user.proverbs.show');
Route::get('/proverbs/by-category/{id}', [UserProverbController::class, 'proverbsByCategory'])->name('user.proverbs.by_category');
//Route::get('/proverbs/search', [UserProverbController::class, 'search'])->name('user.proverbs.search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group([
    'prefix' => 'administrator',
    'as' => 'admin.',
    'middleware' => ['auth', 'isAdmin']
], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('proverbs', ProverbController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('proverbs', ProverbController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});

// Route::group([
//     'as' => 'user.',
// ], function () {
//     Route::get('/proverbs', [UserProverbController::class, 'index'])->name('proverbs.index');
//     Route::get('/proverbs/{proverb}', [UserProverbController::class, 'show'])->name('proverbs.show');
// });

require __DIR__.'/auth.php';
