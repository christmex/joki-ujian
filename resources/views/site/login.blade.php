@extends('layout.layout')

@section('konten')
<h1>Login</h1>
<form method="POST" action="{{ url('doLogin') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="supplier_username">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="text" class="form-control" name="supplier_password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

@if (Session::has('pesan'))
    <div class="alert alert-danger">{{ Session::get('pesan') }}</div>
@endif

@endsection
