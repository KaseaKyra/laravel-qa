<?php

namespace App\Policies;

use App\User;
use App\Question;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any questions.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function view(User $user, Question $question)
    {
        //
    }

    /**
     * Determine whether the user can create questions.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function update(User $user, Question $question)
    {
        return $question->user_id == $user->id && $question->answer_count < 1;
    }

    /**
     * Determine whether the user can delete the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function delete(User $user, Question $question)
    {
        return $question->user_id == $user->id && $question->answer_count < 1;
    }

    /**
     * Determine whether the user can restore the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function restore(User $user, Question $question)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the question.
     *
     * @param User $user
     * @param Question $question
     * @return mixed
     */
    public function forceDelete(User $user, Question $question)
    {
        //
    }
}
