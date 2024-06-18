<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    protected Product $model;

    public function __construct(Product $productModel)
    {
        $this->model = $productModel;
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
