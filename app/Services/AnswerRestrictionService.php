<?php

namespace App\Services;

use App\Interfaces\AnswerBehaviourRepositoryInterface;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\AnswerRestrictionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswerRestrictionService
{
    protected AnswerRestrictionRepositoryInterface $answerRestrictionRepository;

    public function __construct(AnswerRestrictionRepositoryInterface $answerRestrictionRepository)
    {
        $this->answerRestrictionRepository = $answerRestrictionRepository;
    }

    public function create(array $data)
    {
        $validator = Validator::make($data, [
            'answer_id' => 'required',
            'subject_type' => 'required',
        ]);

        if(!$validator->fails()) {
            $this->answerRestrictionRepository->store($data);

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
            $this->answerRestrictionRepository->update($data, $id);

            return true;
        }
        return false;
    }

    public function delete($id)
    {
        return $this->answerRestrictionRepository->delete($id);
    }
}