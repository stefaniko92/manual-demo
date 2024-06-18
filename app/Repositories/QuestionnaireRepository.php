<?php

namespace App\Repositories;

use App\Interfaces\QuestionnaireRepositoryInterface;
use App\Models\Questionnaire;

class QuestionnaireRepository implements QuestionnaireRepositoryInterface
{
    protected Questionnaire $model;

    public function __construct(Questionnaire $questionnaire)
    {
        $this->model = $questionnaire;
    }

    public function index($search = null, $sortColumn = 'id', $sortDirection = 'desc')
    {
        $query = $this->model->newQuery()->orderBy($sortColumn, $sortDirection);

        if ($search) {
            $query->where('name', 'LIKE', '%'.$search.'%');
        }

        return $query->get();
    }

    public function getById($id)
    {
        return $this->model->newQuery()->find($id);
    }

    public function store(array $data)
    {
        return $this->model->newQuery()->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function getActiveQuestionnaire()
    {
        return $this->model->newQuery()->where('is_active', true)
            ->with(['questions.answers.behaviours', 'questions.answers.restrictions'])
            ->orderBy('id', 'desc')
            ->first();
    }
}
