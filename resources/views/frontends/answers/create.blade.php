<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="d-flex align-items-center">
                        <h2>Your answer</h2>
                    </div>
                </div>
                <hr>
                <form action="{{ route('questions.answers.store', [$question->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id=""
                                  cols="30" rows="10"></textarea>
                        @error('body')
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('body') }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
