<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    private $question;

    /**
     * QuestionController constructor.
     * @param Question $question
     */
    public function __construct(Question $question)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
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
     * @param Question $question
     * @return void
     */
    public function show(Question $question)
    {
        $question->increment('view');
        return view('frontends.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $question = $this->question->find($id);

        /*
         * authorize the question using Gate
         */
//        if (\Gate::denies('update-question', $question)) {
//            abort(403, 'Access denied');
//        }

        /*
         * authorize the question using Policy
         */
        $this->authorize('update', $question);

        return view('frontends.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AskQuestionRequest $request
     * @param int $id
     * @return void
     * @throws AuthorizationException
     */
    public function update(AskQuestionRequest $request, $id)
    {
        $question = $this->question->find($id);

        /*
         * authorize the question using Gate
         */
//        if (\Gate::denies('update-question', $question)) {
//            abort(403, 'Access denied');
//        }

        /*
         * authorize the question using policy
         */
        $this->authorize('update', $question);

        $question->update($request->only('title', 'body'));
        return redirect()->route('questions.index')->with('success', 'Your question has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $question = $this->question->find($id);

        /*
         * authorize the the question using Gate
         */
//        if (\Gate::denies('delete-question', $question)) {
//            abort(403, 'Access denied');
//        }

        /*
         * authorize the the question using Policy
         */
        $this->authorize('delete', $question);

        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Your question has been deleted');
    }
}
