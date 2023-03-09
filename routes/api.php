<?php

use App\Http\Controllers\Api\BookController as ApiBookController;
use App\Http\Controllers\api\LeadController as ApiLeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/books', [ApiBookController::class, 'index'])->name('api.book.index');
Route::get('/books/{book}', [ApiBookController::class, 'show'])->name('api.book.show');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/contact-us', [ApiLeadController::class, 'store']);
