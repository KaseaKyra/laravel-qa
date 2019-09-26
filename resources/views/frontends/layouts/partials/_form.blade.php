@csrf
<div class="form-group">
    <label for="question-title">Question title</label>
    <input type="text" name="title" id="question-title"
           class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $question->title) }}">
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <label for="question-body">Explain your question</label>
    <textarea name="body" id="question-body" cols="30" rows="10"
              class="form-control @error('title') is-invalid @enderror">{{ old('body', $question->body) }}</textarea>
    @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>
</div>
