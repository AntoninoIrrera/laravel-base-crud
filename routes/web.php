<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Guest\PageController as GuestPageController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use App\Models\Lead;
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

Route::get('/books', [GuestPageController::class, 'index'])->name('guest.index');
Route::get('/books/{book}', [GuestPageController::class, 'show'])->name('guest.show');

Route::get('/contact-us', [LeadController::class, 'create'])->name('guest.contact-us.create');
Route::post('/contact-us', [LeadController::class, 'store'])->name('guest.contact-us.store');
Route::delete('/lead/{lead}', [LeadController::class, 'destroy'])->name('email.destroy');
Route::get('/lead/trashed', [LeadController::class, 'trashed'])->name('email.trashed');
Route::post('/lead/{lead}/restore', [LeadController::class, 'restore'])->name('email.restore');
Route::delete('/lead/{lead}/force-delete', [LeadController::class, 'forceDelete'])->name('email.force-delete');
Route::post('/lead/restore-all', [LeadController::class, 'restoreAll'])->name('email.restore-all');




Route::get('/dashboard', function () {
    $trashed = Lead::onlyTrashed()->get()->count();
    $totalLeads = Lead::all();
    $leads = Lead::orderBy('created_at', 'desc')->paginate(5);
    return view('dashboard',compact('totalLeads','trashed','leads'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/trashed', [BookController::class, 'trashed'])->name('books.trashed');
    Route::post('/{book}/restore', [BookController::class, 'restore'])->name('books.restore');
    Route::delete('/{book}/force-delete', [BookController::class, 'forceDelete'])->name('books.force-delete');
    Route::post('/restore-all', [BookController::class, 'restoreAll'])->name('books.restore-all');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/books', BookController::class);
    Route::resource('/roles', RoleController::class);
    // Route::resource('/genres', GenreController::class);
    Route::resource('/authors', AuthorController::class);
});

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/trashed', [GenreController::class, 'trashed'])->name('genres.trashed');
    Route::post('/{genre}/restore', [GenreController::class, 'restore'])->name('genres.restore');
    Route::delete('/{genre}/force-delete', [GenreController::class, 'forceDelete'])->name('genres.force-delete');
    Route::post('/restore-all', [GenreController::class, 'restoreAll'])->name('genres.restore-all');
    Route::resource('/genres', GenreController::class);

    Route::get('/trash', [RoleController::class, 'trash'])->name('roles.trash');
    Route::post('/trash/{role}/restore', [RoleController::class, 'restore'])->name('roles.restore');
    Route::post('/trash/restore-all', [RoleController::class, 'restoreAll'])->name('roles.restore-all');
    Route::delete('/trash/{role}/force-delete', [RoleController::class, 'forceDelete'])->name('roles.force-delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
