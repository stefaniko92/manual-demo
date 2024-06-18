<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Question;
use App\Services\QuestionnaireService;
use App\Services\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected QuestionService      $questionService;
    protected QuestionnaireService $questionnaireService;

    public function __construct(
        QuestionService      $questionService,
        QuestionnaireService $questionnaireService
    ) {
        $this->questionService      = $questionService;
        $this->questionnaireService = $questionnaireService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $questions = $this->questionService->getAll($request);

        return view('admin.pages.questions.index')
            ->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $questionnaires = $this->questionnaireService->getAll($request);

        return view('admin.pages.questions.create')
            ->with('questionnaires', $questionnaires);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionCreateRequest $request)
    {
        try {
            $this->questionService->create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('questions.index')->with('success', 'Question created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return view('admin.pages.questions.show')
            ->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view('admin.pages.questions.edit')
            ->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateRequest $request, Question $question)
    {
        try {
            $this->questionService->update($question->id, $request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('questions.index')->with('success', 'Question updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        try {
            $this->questionService->delete($question->id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('questions.index')->with('success', 'Question deleted successfully');


    }
}
