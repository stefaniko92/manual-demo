<?php

namespace App\Services;

use App\Interfaces\QuestionRepositoryInterface;
use App\Repositories\QuestionnaireRepository;
use Illuminate\Http\Request;

class QuestionService
{
    protected QuestionRepositoryInterface $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function getAll(Request $request)
    {
        return $this->questionRepository->index($request->query('search'), $request->query('sortColumn', 'id'), $request->query('sortDirection', 'desc'));
    }

    public function getById($id)
    {
        return $this->questionRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->questionRepository->store($data);
    }

    public function update($id, array $data)
    {
        return $this->questionRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->questionRepository->delete($id);
    }
}