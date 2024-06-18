<?php

namespace App\Services;

use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionnaireRepositoryInterface;
use App\Models\AnswerBehaviour;
use App\Models\AnswerRestriction;
use App\Models\Product;
use Illuminate\Http\Request;

class QuestionnaireService
{
    protected QuestionnaireRepositoryInterface $questionnaireRepository;
    protected AnswerRepositoryInterface $answerRepository;

    public function __construct(QuestionnaireRepositoryInterface $questionnaireRepository,
                                AnswerRepositoryInterface $answerRepository)
    {
        $this->questionnaireRepository = $questionnaireRepository;
        $this->answerRepository = $answerRepository;
    }

    public function getAll(Request $request)
    {
        return $this->questionnaireRepository->index($request->query('search'), $request->query('sortColumn', 'id'), $request->query('sortDirection', 'desc'));
    }

    public function getById($id)
    {
        return $this->questionnaireRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->questionnaireRepository->store($data);
    }

    public function update($id, array $data)
    {
        return $this->questionnaireRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->questionnaireRepository->delete($id);
    }

    public function getActiveQuestionnaire()
    {
        return $this->questionnaireRepository->getActiveQuestionnaire();
    }

    public function evaluateQuestionnaireAnswers(array $ids): array
    {
        $recommendations = [];
        $exclusions = [];
        $excludeAll = false;

        $answers = $this->answerRepository->getByIds($ids);

        foreach ($answers as $answer) {
            foreach ($answer->restrictions as $restriction) {
                if ($restriction->action === AnswerRestriction::ACTION_EXCLUDE_ALL) {
                    $excludeAll = true;
                    break;
                }
                if ($restriction->subject_type === Product::class) {
                    $exclusions[$restriction->subject_id] = true;
                }
            }
        }

        if ($excludeAll) {
            return [];
        }

        foreach ($answers as $answer) {
            foreach ($answer->behaviours as $behaviour) {
                if ($behaviour->action === AnswerBehaviour::ACTION_RECOMMEND && $behaviour->subject_type === Product::class) {
                    if (!isset($exclusions[$behaviour->subject_id])) {
                        $recommendations[$behaviour->subject_id] = $behaviour->subject;
                    }
                }
            }
        }

        return array_values($recommendations);
    }
}