<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;

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

Route::get('/', function () { return view('welcome');})->name('welcome');
Route::get('/about-us', function () { return view('aboutus');})->name('aboutus');
Route::get('/contact-us', function () { return view('contactus');})->name('contactus');
Route::get('/services', function () { return view('services');})->name('services');
Route::get('/products', function () { return view('products');})->name('products');



Route::get('/dashboard', 
 [SectionController::class, 'index'])
 ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
    Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
});

require __DIR__.'/auth.php';
