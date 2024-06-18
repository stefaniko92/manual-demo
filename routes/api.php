<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('active-questionnaire', [\App\Http\Controllers\API\QuestionnaireController::class, 'getActiveQuestionnaire']);
Route::post('evaluate-answers', [\App\Http\Controllers\API\QuestionnaireController::class, 'evaluateQuestionnaireAnswers']);
