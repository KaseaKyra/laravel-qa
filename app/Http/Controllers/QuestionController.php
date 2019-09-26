<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    private $question;

    /**
     * QuestionController constructor.
     */
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $questions = $this->question->with('user')->latest()->paginate(10);
        return view('frontends.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $question = new Question();
        return view('frontends.questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AskQuestionRequest $request
     * @return void
     */
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', 'Your question has been asked');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
