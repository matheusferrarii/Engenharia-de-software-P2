<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('library')->group(function () {
    
    
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::get('/{id}/reviews', [UserController::class, 'getUserReviews']);
    });

    
    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorController::class, 'index']);
        Route::post('/', [AuthorController::class, 'store']);
        Route::get('/{id}', [AuthorController::class, 'show']);
        Route::put('/{id}', [AuthorController::class, 'update']);
        Route::delete('/{id}', [AuthorController::class, 'destroy']);
        Route::get('/{id}/books', [AuthorController::class, 'getAuthorBooks']);
        Route::get('/with-books', [AuthorController::class, 'getAuthorsWithBooks']);
        
    });

    Route::prefix('genres')->group(function () {
        Route::get('/', [GenreController::class, 'index']);
        Route::post('/', [GenreController::class, 'store']);
        Route::get('/{id}', [GenreController::class, 'show']);
        Route::put('/{id}', [GenreController::class, 'update']);
        Route::delete('/{id}', [GenreController::class, 'destroy']);
        Route::get('/{id}/books', [GenreController::class, 'getGenreBooks']);
        Route::get('/with-books', [GenreController::class, 'getGenresWithBooks']);
    });

    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index']);
        Route::get('/a', [BookController::class, 'getBooksWithDetails']);
        Route::post('/', [BookController::class, 'store']);
        Route::get('/{id}', [BookController::class, 'show']);
        Route::put('/{id}', [BookController::class, 'update']);
        Route::delete('/{id}', [BookController::class, 'destroy']);
        Route::get('/{id}/reviews', [BookController::class, 'getReviews']);

    });

    Route::prefix('reviews')->group(function () {
        Route::get('/', [ReviewController::class, 'index']);
        Route::post('/', [ReviewController::class, 'store']);
        Route::get('/{id}', [ReviewController::class, 'show']);
        Route::put('/{id}', [ReviewController::class, 'update']);
        Route::delete('/{id}', [ReviewController::class, 'destroy']);
    });
});