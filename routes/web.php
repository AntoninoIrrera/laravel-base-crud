<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Guest\PageController as GuestPageController;
use App\Http\Controllers\ProfileController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

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

Route::get('/books',[GuestPageController::class, 'index'])->name('guest.index');
Route::get('/books/{book}', [GuestPageController::class, 'show'])->name('guest.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/trashed', [BookController::class, 'trashed'])->name('books.trashed');
    Route::post('/{book}/restore', [BookController::class, 'restore'])->name('books.restore');
    Route::delete('/{book}/force-delete', [BookController::class, 'forceDelete'])->name('books.force-delete');
    Route::post('/restore-all', [BookController::class, 'restoreAll'])->name('books.restore-all');
    Route::resource('/books', BookController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
