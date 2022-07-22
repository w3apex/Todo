@if (session('SUCCESS'))
    <div class="alert alert-success">
        {{ session('SUCCESS')}}
    </div> 
@endif

@if (session('ERROR'))
    <div class="alert alert-danger">
        {{ session('ERROR')}}
    </div> 
@endif