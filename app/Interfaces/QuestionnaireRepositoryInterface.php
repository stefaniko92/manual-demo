<?php

namespace App\Interfaces;

interface QuestionnaireRepositoryInterface
{
    public function index($search, $sortColumn, $sortDirection);
    public function getById($id);
    public function store(array $data);
    public function update(array $data,$id);
    public function delete($id);
    public function getActiveQuestionnaire();
}
