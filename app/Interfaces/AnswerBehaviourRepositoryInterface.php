<?php

namespace App\Interfaces;

interface AnswerBehaviourRepositoryInterface
{
    public function index($search, $sortColumn, $sortDirection);
    public function getById($id);
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);
}
