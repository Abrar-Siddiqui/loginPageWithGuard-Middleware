@extends('Admin.Layout')
@section('title','Login Admin Page')
@section('content')
    <div class="container-fluid">
        <div class="container" >
            <div class="row d-flex align-items-center justify-content-center" style="height: 90vh">
                <div class="col-lg-4 col-md-6 col-sm-9 col-auto shadow-lg border-0 p-3">
                    @include('Admin.message')
                    <h4 class="text-center py-2">Login Admin Panal</h4>
                    <form action="{{ route('admin.authenticate') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" name="email" placeholder="Username/email" class="form-control @error('email') is-invalid

                          @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" name="password" placeholder="password" class="form-control @error('password') is-invalid

                          @enderror" id="exampleInputPassword1">
                          @error('password')
                              <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
