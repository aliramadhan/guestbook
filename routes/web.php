<?php
require __DIR__.'/auth.php';

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//Guestbook
Route::resource('guestbook', App\Http\Controllers\GuestBookController::class)->middleware('auth');
Route::get('guestbook-trashed',[App\Http\Controllers\GuestBookController::class, 'trash'])->name('guestbook.trash')->middleware('auth');
Route::post('guestbook/trash/{id}/restore', [App\Http\Controllers\GuestBookController::class , 'restore'])->name('guestbook.restore')->middleware('auth');
Route::delete('guestbook/{id}/delete-permanent', [App\Http\Controllers\GuestBookController::class,'deletePermanent'])->name('guestbook.deletePermanent')->middleware('auth');
//User
Route::get('profile/change-password', [App\Http\Controllers\UserController::class,'viewChangePassword'])->name('profile.viewchange_password')->middleware('auth');
Route::post('profile/change-password', [App\Http\Controllers\UserController::class,'ChangePassword'])->name('profile.change_password')->middleware('auth');