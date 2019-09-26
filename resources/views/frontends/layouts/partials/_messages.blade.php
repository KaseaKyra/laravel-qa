@if(session('success'))
    <div class="alert alert-success" id="close-alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong>
        {{ session('success') }}
    </div>
@endif
