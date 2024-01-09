<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', [HomeController:: class, "rent"]);
Route::get('/rent', [HomeController:: class, "rent"]);


Route::get('/addRent', [HomeController::class, "incident"]);
Route::post('/rentInfo', [HomeController::class, "rentInfo"]);
Route::get('/rentDetail/{id}', [HomeController::class, "rentDetail"]);
Route::get('/rentType/{type}', [HomeController::class, "rentType"]);
Route::post('/addWish', [HomeController::class, "addWish"]);
Route::get('/wishlist', [HomeController::class, "wishlist"]);
Route::post('/cancelWish', [HomeController::class, "cancelWish"]);
Route::get('/myRentPost', [HomeController::class, "rentPost"]);
Route::get('/update/{id}', [HomeController::class, "update"]);
Route::post('/updateRent', [HomeController::class, "updateRent"]);
Route::post('/delete', [HomeController::class, "delete"]);
Route::get('/rentLocation/{location}', [HomeController::class, "rentLocation"]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/rent');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware('verified');

