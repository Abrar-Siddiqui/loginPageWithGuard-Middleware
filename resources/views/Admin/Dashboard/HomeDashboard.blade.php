@extends('Admin.Dashboard.Layout')
@section('title','Admin Dashboard')

@section('content')
    <h1>Welcome Dashboard</h1>
    <a href="{{ route('admin.logout') }}">Logout</a>
@endsection
