<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionnaireCreateRequest;
use App\Http\Requests\QuestionnaireUpdateRequest;
use App\Models\Questionnaire;
use App\Services\QuestionnaireService;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    protected QuestionnaireService $questionnaireService;

    public function __construct(QuestionnaireService $questionnaireService) {
        $this->questionnaireService = $questionnaireService;
    }

    public function index(Request $request)
    {
        $questionnaires = $this->questionnaireService->getAll($request);

        return view('admin.pages.questionnaire.index')
            ->with('questionnaires', $questionnaires);
    }

    public function create()
    {
        return view('admin.pages.questionnaire.create');
    }

    public function store(QuestionnaireCreateRequest $request)
    {
        try {
            $this->questionnaireService->create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('questionnaire.index')->with('success', 'Questionnaire created successfully');
    }

    public function show(Questionnaire $questionnaire)
    {
        return view('admin.pages.questionnaire.show')
            ->with('questionnaire', $questionnaire);
    }

    public function edit(Questionnaire $questionnaire)
    {
        return view('admin.pages.questionnaire.edit')
            ->with('questionnaire', $questionnaire);
    }

    public function update(Questionnaire $questionnaire, QuestionnaireUpdateRequest $request)
    {
        try {
            $this->questionnaireService->update($questionnaire->id, $request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('questionnaire.index')->with('success', 'Questionnaire updated successfully');
    }

    public function delete(Questionnaire $questionnaire)
    {
        try {
            $this->questionnaireService->delete($questionnaire->id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('questionnaire.index')->with('success', 'Questionnaire deleted successfully');
    }


}
