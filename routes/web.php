<?php

use App\Http\Controllers\PostController;

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
    return view('welcome');
});
Route::get('/post',[PostController::class,'index'])->name('posts.index');
Route::get('/show/{post}',[PostController::class,'show'])->name('posts.show');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/edit/{id}', [PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/post/delete/{post}', [PostController::class,'delete'])->name('post.delete');
// Route::delete('post/delete/{post}', [PostController::class, 'delete'])->name('post.delete');
