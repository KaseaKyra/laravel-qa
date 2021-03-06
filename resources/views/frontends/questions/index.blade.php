@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All questions</h2>
                            <div class="ml-auto">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Add
                                    question</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('frontends.layouts.partials._messages')
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counter">
                                    <div class="vote">
                                        <strong>{{ $question->vote }}</strong> {{ Str::plural('vote', $question->vote) }}
                                    </div>
                                    <div class="status {{ $question->status }}">
                                        <strong>{{ $question->answer_count}}</strong>
                                        {{ Str::plural('answer', $question->answer_count) }}
                                    </div>
                                    <div class="view">
                                        {{ $question->view . " " . Str::plural('view', $question->view) }}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0">
                                            <a href="{{ $question->url }}">{{ $question->title }}</a>
                                        </h3>
                                        <div class="ml-auto">
                                            {{--authorize the the question using Gate--}}
                                            {{--                                            @if(Auth::user()->can('update-question', $question))--}}
                                            {{--                                                <a href="{{ route('questions.edit', [$question->id]) }}"--}}
                                            {{--                                                   class="btn btn-sm btn-outline-info">Edit</a>--}}
                                            {{--                                            @endif--}}
                                            {{--                                            @if(Auth::user()->can('delete-question', $question))--}}
                                            {{--                                                <form class="form-delete" method="post"--}}
                                            {{--                                                      action="{{ route('questions.destroy', [$question->id]) }}">--}}
                                            {{--                                                    @method('DELETE')--}}
                                            {{--                                                    @csrf--}}
                                            {{--                                                    <button type="submit" class="btn btn-outline-danger btn-sm"--}}
                                            {{--                                                            onclick="return confirm('Are you sure want to delete this item?')">--}}
                                            {{--                                                        Delete--}}
                                            {{--                                                    </button>--}}
                                            {{--                                                </form>--}}
                                            {{--                                            @endif--}}
                                            {{--authorize the the question using Policy--}}
                                            @can('update', $question)
                                                <a href="{{ route('questions.edit', [$question->id]) }}"
                                                   class="btn btn-sm btn-outline-info">Edit</a>
                                            @endcan
                                            @can('delete', $question)
                                                <form class="form-delete" method="post"
                                                      action="{{ route('questions.destroy', [$question->id]) }}">
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
