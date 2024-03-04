<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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
    return view('twitter');
});
Route::match(['get','post'],'/signup',[UserController::class,'create'])->name('signup');
Route::match(['get','post'],'/login',[UserController::class,'authenticate'])->name('login');
Route::get('/forgotPassword',function(){
    return view('forgotPassword');
});
Route::middleware('auth')->group(function () {
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::match(['get','post'],'/profile',[UserController::class,'userProfileEdit'])->name('profile');
    Route::match(['get','post'],'/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{id}/like', [CommentController::class, 'like'])->name('comments.like');
    Route::post('/comments/{id}/retweet', [CommentController::class, 'retweet'])->name('comments.retweet');
});
    
