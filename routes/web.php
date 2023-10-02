<?php

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



Auth::routes();

Route::get('/post/create', [App\Http\Controllers\postcountroller::class, 'create'])->name('index')->middleware('auth');;
Route::any('/post', [App\Http\Controllers\postcountroller::class, 'store'])->name('post.store')->middleware('auth');;
Route::get('/post/{post}', [App\Http\Controllers\postcountroller::class, 'show'])->name('post.show')->middleware('auth');;
Route::PATCH('/post/{post}', [App\Http\Controllers\postcountroller::class, 'update'])->name('update')->middleware('auth');;
Route::get('/post/{post}/edit', [App\Http\Controllers\postcountroller::class, 'edit'])->name('post.edit')->middleware('auth');;

Route::get('/profile/{user}', [App\Http\Controllers\prolfilecountroller::class, 'index'])->name('profile.index')->middleware('auth');
Route::PATCH('/profile/{user}', [App\Http\Controllers\prolfilecountroller::class, 'update'])->name('index')->middleware('auth');
Route::get('/profile/{user}/edit', [App\Http\Controllers\prolfilecountroller::class, 'edit'])->name('profile.edit')->middleware('auth');


Route::get('/home', [App\Http\Controllers\homecountroller::class, 'index'])->name('dashboard')->middleware('auth');


Route::any('/Setting', [App\Http\Controllers\Settingcountroller::class, 'index'])->name('setting.index')->middleware('auth');
Route::any('/Setting/Style', [App\Http\Controllers\CouleurController::class, 'edit'])->name('setting.edit')->middleware('auth');



Route::post('like',[App\Http\Controllers\LikesController::class, 'like'])->middleware('auth')->name('like');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search')->middleware('auth');

Route::delete('unlike',[App\Http\Controllers\LikesController::class, 'unlike'])->middleware('auth')->name('unlike');

Route::post('/add/comment/{postId}',[App\Http\Controllers\postcountroller::class, 'Comment'])->middleware('auth')->name('add.comment');
Route::get('/show/comment/',[App\Http\Controllers\postcountroller::class, 'ShowComment'])->middleware('auth')->name('show.comment');

Route::any('follow',[App\Http\Controllers\FollowerController::class, 'follow'])->middleware('auth')->name('follow');

Route::get('/load-more-comments', [App\Http\Controllers\homecountroller::class,'loadMoreComments'])->name('more.comments');



