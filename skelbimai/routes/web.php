<?php

use Illuminate\Support\Facades\Route;
use Illuminate\support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'landingpage'])->name('homepage');
Route::get('/profile/ads', [App\Http\Controllers\UserPanelController::class, 'myAds'])->name('profile.ads');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/ad', 'App\Http\Controllers\AdController');
Route::resource('/comment', 'App\Http\Controllers\CommentsController');

// Messages

Route::get('/message/send/{receiverId}', [App\Http\Controllers\MessageController::class, 'create'])->name('message.create');
Route::get('/message/read/{chatFriendId}', [App\Http\Controllers\MessageController::class, 'read'])->name('message.read');
Route::get('/messages', [App\Http\Controllers\MessageController::class, 'inbox'])->name('message.inbox');
Route::post('/message/send/', [App\Http\Controllers\MessageController::class, 'send'])->name('message.send');
