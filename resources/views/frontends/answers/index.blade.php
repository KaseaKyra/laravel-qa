@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h2>The question</h2>
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a href="" title="This question is useful" class="vote-up">
                                    <i class="fas fa-caret-up fa-3x"></i>
                                </a>
                                <span class="votes-count">1230</span>
                                <a href="" title="This question is not useful" class="vote-down off">
                                    <i class="fas fa-caret-down fa-3x"></i>
                                </a>
                                <a href="" title="click to markdown as favorite question (Click again to undo"
                                   class="favorite favorited">
                                    <i class="fas fa-star"></i>
                                    <span class="favorites-count fa-2x"> 123</span>
                                </a>
                            </div>
                            <div class="media-body clearfix">
                                {!! $question->body_html !!}
                                <div class="float-right">
                                    <span class="text-muted">Answered {{ $question->created_date }}</span>
                                    <div class="media">
                                        <a href="{{ $question->url }}" class="pr-2">
                                            <img src="{{ $question->user->avatar }}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{---------------------ANSWER---------------------}}
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>{{ $answersCount . " " . Str::plural('Answer', $answersCount) }}</h2>
                        </div>
                        <hr>
                        @include("frontends.layouts.partials._messages")
                        @foreach($answers as $answer)
                            <div class="media">
                                <div class="d-flex flex-column vote-controls">
                                    <a href="" title="This answer is useful" class="vote-up">
                                        <i class="fas fa-caret-up fa-3x"></i>
                                    </a>
                                    <span class="votes-count">1230</span>
                                    <a href="" title="This answer is not useful" class="vote-down off">
                                        <i class="fas fa-caret-down fa-3x"></i>
                                    </a>
                                    <a href="" title="Mark answer as best answer" class="{{ $answer->status }}">
                                        <i class="fas fa-check fa-2x"></i>
                                    </a>
                                </div>
                                <div class="media-body clearfix">
                                    {!! $answer->body_html !!}
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="ml-auto">
                                                @can('update', $answer)
                                                    <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}"
                                                       class="btn btn-sm btn-outline-info">Edit</a>
                                                @endcan
                                                @can('delete', $answer)
                                                    <form class="form-delete" method="post"
                                                          action="{{ route('questions.answers.destroy',
                                                                    [$question->id, $answer->id]) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                                                onclick="return confirm('Are you sure want to delete this item?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                            <div class="media">
                                                <a href="{{ $answer->url }}" class="pr-2">
                                                    <img src="{{ $answer->user->avatar }}" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include("frontends.answers.create")
    </div>
@endsection
