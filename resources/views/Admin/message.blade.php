@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
    Error : {{ Session::get('error') }}
  </div>
@endif
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    Success : {{ Session::get('success') }}
  </div>
@endif

