<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerCreateRequest;
use App\Http\Requests\AnswerUpdateRequest;
use App\Models\Answer;
use App\Services\AnswerService;
use App\Services\QuestionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    protected AnswerService $answerService;
    protected QuestionService $questionService;

    public function __construct(AnswerService $answerService, QuestionService $questionService)
    {
        $this->answerService = $answerService;
        $this->questionService = $questionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $answers = $this->answerService->getAll($request);

        return view('admin.pages.answers.index')->with('answers', $answers);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $questions = $this->questionService->getAll($request);

        return view('admin.pages.answers.create')
            ->with('questions', $questions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->answerService->create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('answers.index')->with('success', 'Answer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer, Request $request)
    {
        $questions = $this->questionService->getAll($request);

        return view('admin.pages.answers.edit')
            ->with('answer', $answer)
            ->with('questions', $questions);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswerUpdateRequest $request, Answer $answer)
    {
        try {
            $this->answerService->update($answer->id, $request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('answers.index')->with('success', 'Answer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        try {
            $this->answerService->delete($answer->id);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => $e->getMessage()]);
        }

        return redirect()->route('answers.index')->with('success', 'Answer deleted successfully');
    }
}
