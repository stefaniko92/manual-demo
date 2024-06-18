<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'dashboard'])->middleware(['auth', 'verified', 'is_admin'])->name('dashboard');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('questionnaire', [\App\Http\Controllers\QuestionnaireController::class, 'index'])->name('questionnaire.index');
    Route::get('questionnaire/create', [\App\Http\Controllers\QuestionnaireController::class, 'create'])->name('questionnaire.create');
    Route::post('questionnaire/store', [\App\Http\Controllers\QuestionnaireController::class, 'store'])->name('questionnaire.store');
    Route::get('questionnaire/{questionnaire}/show', [\App\Http\Controllers\QuestionnaireController::class, 'show'])->name('questionnaire.show');
    Route::get('questionnaire/{questionnaire}/edit', [\App\Http\Controllers\QuestionnaireController::class, 'edit'])->name('questionnaire.edit');
    Route::put('questionnaire/{questionnaire}/update', [\App\Http\Controllers\QuestionnaireController::class, 'update'])->name('questionnaire.update');
    Route::delete('questionnaire/{questionnaire}/delete', [\App\Http\Controllers\QuestionnaireController::class, 'delete'])->name('questionnaire.delete');

    Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('products/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}/delete', [\App\Http\Controllers\ProductController::class, 'delete'])->name('products.delete');

    Route::get('answers', [\App\Http\Controllers\AnswerController::class, 'index'])->name('answers.index');
    Route::get('answers/create', [\App\Http\Controllers\AnswerController::class, 'create'])->name('answers.create');
    Route::post('answers/store', [\App\Http\Controllers\AnswerController::class, 'store'])->name('answers.store');
    Route::get('answers/{answer}/edit', [\App\Http\Controllers\AnswerController::class, 'edit'])->name('answers.edit');
    Route::put('answers/{answer}/update', [\App\Http\Controllers\AnswerController::class, 'update'])->name('answers.update');
    Route::delete('answers/{answer}/delete', [\App\Http\Controllers\AnswerController::class, 'destroy'])->name('answers.delete');

    Route::get('questions', [\App\Http\Controllers\QuestionController::class, 'index'])->name('questions.index');
    Route::get('questions/create', [\App\Http\Controllers\QuestionController::class, 'create'])->name('questions.create');
    Route::post('questions/store', [\App\Http\Controllers\QuestionController::class, 'store'])->name('questions.store');
    Route::get('questions/{question}', [\App\Http\Controllers\QuestionController::class, 'show'])->name('questions.show');
    Route::get('questions/{question}/edit', [\App\Http\Controllers\QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('questions/{question}/update', [\App\Http\Controllers\QuestionController::class, 'update'])->name('questions.update');
    Route::delete('questions/{question}/delete', [\App\Http\Controllers\QuestionController::class, 'destroy'])->name('questions.delete');

});

require __DIR__.'/auth.php';
