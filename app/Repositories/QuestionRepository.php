<?php

namespace App\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{
    protected $model;
    /**
     * Create a new class instance.
     */
    public function __construct(Question $model)
    {
        $this->model = $model;
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
}
