@if (Session::has('ok'))
    <div class="col-4 alert alert-success">
        {{ Session::get('ok') }}
    </div>
@endif
@if (Session::has('info'))
    <div class="col-4 alert alert-info">
        {{ Session::get('info') }}
    </div>
@endif