<?php

namespace App\Services;

use App\Interfaces\AnswerBehaviourRepositoryInterface;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\AnswerRestrictionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswerBehaviourService
{
    protected AnswerBehaviourRepositoryInterface $answerBehaviourRepository;

    public function __construct(AnswerBehaviourRepositoryInterface $answerBehaviourRepository)
    {
        $this->answerBehaviourRepository = $answerBehaviourRepository;
    }

    public function create(array $data)
    {
        $validator = Validator::make($data, [
            'answer_id' => 'required',
            'subject_type' => 'required',
        ]);

        if(!$validator->fails()) {
            $this->answerBehaviourRepository->store($data);

            return true;
        }
        return false;
    }

    public function update(array $data, $id)
    {
        $validator = Validator::make($data, [
            'answer_id' => 'required',
            'subject_type' => 'required',
        ]);

        if(!$validator->fails()) {
            $this->answerBehaviourRepository->update($data, $id);

            return true;
        }
        return false;
    }

    public function delete($id)
    {
        return $this->answerBehaviourRepository->delete($id);
    }
}