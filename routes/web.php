<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProverbController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('proverbs', ProverbController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});

// Route::get('/', function () {
//     $proverb = Proverb::create([
//         'en' => [
//             'content' => 'the content',
//         ],
//         'uz' => [
//             'content' => 'kontent',
//         ]
//     ]);

//     return $proverb;
// });

// Route::middleware(['auth', 'role:administrator'])->group(function () {
//     Route::resource('proverbs', ProverbController::class);
//     Route::resource('categories', CategoryController::class);
//     Route::resource('tags', TagController::class);
// });


require __DIR__.'/auth.php';
