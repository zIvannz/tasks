<?php

use App\Http\Controllers\ProfileController;
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
    return view('pages.home');
})->name('task.home');;

Route::get('/show/{Title}/{id}', function () {
    return view('pages.show');
})->name('task.show');;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Tasks

    Route::get('/tasks', function () {
        return view('cabinet.tasks');
    })->name('task.index');

    Route::get('/task/edit/{id}', function () {
        return view('cabinet.edit');
    })->name('task.edit');

    Route::get('/tasks/create', function () {
        return view('cabinet.create');
    })->name('task.create');
});

require __DIR__.'/auth.php';
