<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\User;

Route::get('/', function () {
        return view('welcome');})->name('home');

    Route::get('/cars', [CarModelController::class, 'index'])->name('cars.index');
    Route::get('/cars/{id}', [CarModelController::class, 'show'])->name('cars.show');

Route::get('/users/{user}', function (User $user) {
    $user->load(['profile', 'posts', 'comments.post']);
    return view('users.show', [
        'user' => $user,]);})->name('users.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/my-profile', function () {
        return redirect()->route('users.show', auth()->user());
    })->name('users.me');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';