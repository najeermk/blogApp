<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//user routes
Route::get('/', [UserController::class, 'index'])->middleware('auth');
Route::get('/register-page', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register'])->middleware('auth');
Route::get('/login-page', [UserController::class, 'loginPage'])->name('login');
Route::post('/login', [UserController::class, 'login'])->middleware('auth');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/profile/{user:username}', [UserController::class, 'profile'])->middleware('auth');

//post routes
Route::get('/post/create', [PostController::class, 'createPage'])->middleware('auth');
Route::post('/post/create', [PostController::class, 'store'])->middleware('auth');
Route::get('/post/show/{post}', [PostController::class, 'show'])->middleware('auth');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->middleware('auth');
Route::put('/post/edit/{post}', [PostController::class, 'update'])->middleware('auth');
Route::delete('/post/delete/{post}', [PostController::class, 'delete'])->middleware('auth');