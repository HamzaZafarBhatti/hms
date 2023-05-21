@if (Session::has('success'))
    <div class="alert alert-success">
        <b>
            {{ session('success') }}
        </b>
    </div>
@elseif(Session::has('warning'))
    <div class="alert alert-warning">
        <b>
            {{ session('warning') }}
        </b>
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            {{ session('error') }}
        </div>
    </div>
@elseif(Session::has('deleted'))
    <div class="alert alert-secondary">
        <b>
            {{ session('deleted') }}
        </b>
    </div>
@endif
