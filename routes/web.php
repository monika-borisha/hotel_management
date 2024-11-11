<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('home.index');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/',[AdminController::class,'home']);
Route::get('/home',[AdminController::class,'index'])->name('home');
Route::get('/add-room',[AdminController::class,'create'])->name('create.room');
Route::post('/add_room',[AdminController::class,'store'])->name('add_room');
Route::get('/view-room',[AdminController::class,'view_room'])->name('view.room');
Route::get('/edit-room/{id}',[AdminController::class,'edit_room'])->name('edit.room');
Route::put('/update-room/{id}', [AdminController::class, 'update_room'])->name('update_room');
Route::get('/delete-room/{id}',[AdminController::class,'destroy'])->name('delete.room');

Route::get('/room-detail/{id}',[RoomController::class,'room_detail'])->name('room.detail');
Route::post('/book-room/{id}',[RoomController::class,'book_room'])->name('book.room');
Route::get('/view-booking',[AdminController::class,'booking'])->name('view.booking');
Route::get('/delete-booking/{id}',[AdminController::class,'delete_booking'])->name('delete.booking');
