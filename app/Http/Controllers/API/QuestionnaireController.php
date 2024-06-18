<?php

namespace App\Http\Controllers\API;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\EvaluateQuestionnaireAnswersRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\QuestionnaireResource;
use App\Http\Resources\QuestionResource;
use App\Services\QuestionnaireService;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    protected QuestionnaireService $questionnaireService;

    public function __construct(QuestionnaireService $questionnaireService)
    {
        $this->questionnaireService = $questionnaireService;
    }

    public function getActiveQuestionnaire(): \Illuminate\Http\JsonResponse
    {
        $questionnaire = $this->questionnaireService->getActiveQuestionnaire();

        return ApiResponseClass::sendResponse(new QuestionnaireResource($questionnaire), 'Questionnaire returned successfully');
    }

    public function evaluateQuestionnaireAnswers(EvaluateQuestionnaireAnswersRequest $request) : \Illuminate\Http\JsonResponse
    {
        $answers = $request->get('answers');

        $recommendedProducts = $this->questionnaireService->evaluateQuestionnaireAnswers($answers);

        return ApiResponseClass::sendResponse(ProductResource::collection($recommendedProducts), 'Recommended products returned successfully');
    }
}
