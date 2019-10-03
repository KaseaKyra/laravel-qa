<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Question $question
     * @param Request $request
     * @return void
     */
    public function store(Question $question, Request $request)
    {
        $question->answers()->create($request->validate([
                'body' => 'required'
            ]) + ['user_id' => Auth::id()]);
        return back()->with('success', 'Your answer has been submitted successfully');
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
     * @param Question $question
     * @param Answer $answer
     * @return void
     * @throws AuthorizationException
     */
    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        return view('frontends.answers.edit', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @param Answer $answer
     * @return void
     * @throws AuthorizationException
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        $answer->update($request->validate([
            'body' => 'required',
        ]));
        return redirect()->route('questions.show', $question->slug)
            ->with('success', 'You has been updated your answer successfully');
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
