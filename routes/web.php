<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'user'])->name('user.dashboard');



//

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';









Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/addpost', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{postId}', [CommentController::class, 'show'])->name('posts.show');

Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('posts.comments.store');

Route::delete('/posts/comments/{id}', [CommentController::class, 'destroy'])->name('posts.comments.destroy');





Route::get('/posts-create', function() {
    return "Test réussi !";
});