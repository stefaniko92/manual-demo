<?php

namespace App\Interfaces;

interface AnswerRepositoryInterface
{
    public function index($search, $sortColumn, $sortDirection);
    public function getById($id);
    public function getByIds(array $ids);
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);
}
