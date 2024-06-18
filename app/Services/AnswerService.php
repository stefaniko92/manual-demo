<?php

namespace App\Services;

use App\Interfaces\AnswerBehaviourRepositoryInterface;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\AnswerRestrictionRepositoryInterface;
use Illuminate\Http\Request;

class AnswerService
{
    protected AnswerRepositoryInterface $answerRepository;
    protected AnswerBehaviourService $answerBehaviourService;
    protected AnswerRestrictionService $answerRestrictionService;
    protected AnswerBehaviourRepositoryInterface $answerBehaviourRepository;
    protected AnswerRestrictionRepositoryInterface $answerRestrictionRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository,
                                AnswerBehaviourRepositoryInterface $answerBehaviourRepository,
                                AnswerBehaviourService $answerBehaviourService,
                                AnswerRestrictionService $answerRestrictionService,
                                AnswerRestrictionRepositoryInterface $answerRestrictionRepository)
    {
        $this->answerRepository = $answerRepository;
        $this->answerBehaviourRepository = $answerBehaviourRepository;
        $this->answerRestrictionRepository = $answerRestrictionRepository;
        $this->answerBehaviourService = $answerBehaviourService;
        $this->answerRestrictionService = $answerRestrictionService;
    }

    public function getAll(Request $request)
    {
        return $this->answerRepository->index($request->query('search'), $request->query('sortColumn', 'id'), $request->query('sortDirection', 'desc'));
    }

    public function getById($id)
    {
        return $this->answerRepository->getById($id);
    }

    public function create(array $data)
    {
        $behaviours = $data['behaviours'];
        $restrictions = $data['restrictions'];
        unset($data['behaviours'], $data['restrictions']);

        $answer = $this->answerRepository->store($data);

        foreach ($behaviours as $behaviour) {
            $behaviour['answer_id'] = $answer->id;
            $this->answerBehaviourService->create($behaviour);
        }

        foreach ($restrictions as $restriction) {
            $restriction['answer_id'] = $answer->id;
            $this->answerRestrictionService->create($restriction);
        }

        return $answer->refresh();
    }

    public function update($id, array $data)
    {
        $answer = $this->answerRepository->getById($id);
        $behaviours = $data['behaviours'] ?? [];
        $restrictions = $data['restrictions'] ?? [];
        unset($data['behaviours'], $data['restrictions']);

        $this->answerRepository->update($data, $id);

        foreach ($behaviours as $behaviourData) {
            if (isset($behaviourData['delete']) && $behaviourData['delete'] == 1) {
                $this->answerBehaviourService->delete($behaviourData['id']);
            } else if (isset($behaviourData['id'])) {
                $this->answerBehaviourService->update($behaviourData, $behaviourData['id']);
            } else {
                $behaviourData['answer_id'] = $answer->id;
                $this->answerBehaviourService->create($behaviourData);
            }
        }

        foreach ($restrictions as $restrictionData) {
            if (isset($restrictionData['delete']) && $restrictionData['delete'] == 1) {
                $this->answerRestrictionService->delete($restrictionData['id']);
            } else if (isset($restrictionData['id'])) {
                $this->answerRestrictionService->update($restrictionData, $restrictionData['id']);
            } else {
                $restrictionData['answer_id'] = $answer->id;
                $this->answerRestrictionService->create($restrictionData);
            }
        }

        return $answer->refresh();
    }

    public function delete($id)
    {
        return $this->answerRepository->delete($id);
    }
}