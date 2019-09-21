@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All questions</div>
                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counter">
                                    <div class="vote">
                                        <strong>{{ $question->vote }}</strong> {{ Str::plural('vote', $question->vote) }}
                                    </div>
                                    <div class="status {{ $question->status }}">
                                        <strong>{{ $question->answer }}</strong>
                                        {{ Str::plural('answer', $question->answer) }}
                                    </div>
                                    <div class="view">
                                        {{ $question->view . " " . Str::plural('view', $question->view) }}
                                    </div>
                                </div>
                                <div class="media-body">
                                    {{--                                    <h3 class="mt-0"><a--}}
                                    {{--                                            href="{{ route('questions.show', [$question->id]) }}">{{ $question->title }}</a>--}}
                                    {{--                                    </h3>--}}
                                    <h3 class="mt-0">
                                        <a href="{{ $question->url }}">{{ $question->title }}</a>
                                    </h3>
                                    <p class="lead">Asked by
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        <small class="text-muted">{{ $question->created_date }}</small>
                                    </p>
                                    {{ Str::limit($question->body, 150) }}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
