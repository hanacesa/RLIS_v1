<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('volunteer', App\Http\Controllers\VolunteerController::class);
Route::resource('supervisor', App\Http\Controllers\SupervisorController::class);
Route::resource('book', App\Http\Controllers\BookController::class);
Route::resource('member', App\Http\Controllers\MemberController::class);
Route::resource('borrow', App\Http\Controllers\BorrowController::class);

Route::get('/books/{book}', [BookController::class, 'show'])->name('book.show');
//Route::get('borrow/{borrow}/create', [BorrowController::class, 'create'])->name('borrow.create');
Route::get('borrow/{borrow}/create', [BookController::class, 'create'])->name('borrow.create');
Route::get('volunteer/{volunteer}/show', [App\Http\Controllers\VolunteerController::class, 'show'])->name('volunteer.show');
Route::get('/borrow/create/{member_id}/{book_id}', [BorrowController::class, 'create'])->name('borrow.create');
Route::post('/borrow/store', [BorrowController::class, 'store'])->name('borrow.store');


//Route::get('book', 'BookController@index')->name('book.index');

