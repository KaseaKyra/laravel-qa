@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h2>Editing answer for question <strong>{{ $question->title }}</strong> fr</h2>
                            </div>
                        </div>
                        <hr>
                        <form action="{{ route('questions.answers.update', [$question, $answer->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id=""
                                  cols="30" rows="10">{{ old('body', $answer->body) }}</textarea>
                                @error('body')
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                                <a href="{{ route('questions.show', [$question->slug]) }}" class="btn btn-lg btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
