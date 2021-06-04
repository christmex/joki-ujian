@extends('layout.layout')

@section('konten')
<h1>Register</h1>

@if ($errors->any())
    @foreach ($errors->all() as $err)
        <div class="alert alert-danger">{{ $err }}</div>
    @endforeach
@endif

<form method="POST" action="{{ url('doRegister') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Supplier Nama : </label>
        <input type="text" class="form-control" name="supplier_nama">
    </div>
    <div class="mb-3">
        <label class="form-label">Supplier Username : </label>
        <input type="text" class="form-control" name="supplier_username">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="text" class="form-control" name="supplier_password">
    </div>
    <div class="mb-3">
        <label class="form-label">Confirmation Password</label>
        <input type="text" class="form-control" name="supplier_password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Daftar</button>
</form>
@endsection
