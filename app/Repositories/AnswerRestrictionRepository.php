<?php

namespace App\Repositories;

use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\AnswerRestrictionRepositoryInterface;
use App\Models\AnswerRestriction;

class AnswerRestrictionRepository implements AnswerRestrictionRepositoryInterface
{
    protected $model;
    /**
     * Create a new class instance.
     */
    public function __construct(AnswerRestriction $model)
    {
        $this->model = $model;
    }

    public function index($search = null, $sortColumn = 'id', $sortDirection = 'desc'): \Illuminate\Database\Eloquent\Collection|array
    {
        $query = $this->model->newQuery()->orderBy($sortColumn, $sortDirection);

        if ($search) {
            $query->where('name', 'LIKE', '%'.$search.'%');
        }

        return $query->get();
    }

    public function getById($id): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Builder|array|null
    {
        return $this->model->newQuery()->find($id);
    }

    public function store(array $data): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
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
