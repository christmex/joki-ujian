@extends('layout.layout')

@section('konten')
<h1>Selamat Datang, Administrator 
    @if (Session::has('yglogin'))
    <a href="{{ url('logout') }}" class="btn btn-danger">Logout</a>
    @endif
</h1>
<hr>
<h1>Master Obat</h1>
@if (Session::has('pesan'))
    <div class="alert alert-success">{{ Session::get('pesan') }}</div>
@endif

<form method="POST" action="{{ url('/admin/simpanobat') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Obat ID :</label>
        <input type="text" class="form-control" name="obat_id">
    </div>
    <div class="mb-3">
        <label class="form-label">Obat Nama :</label>
        <input type="text" class="form-control" name="obat_nama">
    </div>
    <div class="mb-3">
        <label class="form-label">Obat Deskripsi :</label>
        <input type="text" class="form-control" name="obat_deskripsi">
    </div>
    <div class="mb-3">
        <label class="form-label">Jenis Obat :</label>
        <select name="jenis_id" id="jenis_id" class="form-control">
            @foreach ($jenisobat as $jenis)
                <option value="{{ $jenis->jenis_id }}">{{ $jenis->jenis_nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Obat Dosis :</label>
        <input type="number" class="form-control" name="obat_dosis">
    </div>
    
    <button type="submit" class="btn btn-success">Tambah</button>
    <button type="button" class="btn btn-primary">Ubah</button>

    <hr>

    <table class="table table-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Jenis</th>
                <th>Dosis</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $obat)
                <tr>
                    <td>{{ $obat->obat_id }}</td>
                    <td>{{ $obat->obat_nama }}</td>
                    <td>{{ $obat->obat_deskripsi }}</td>
                    <td>{{ $obat->Jenis->jenis_nama }}</td>
                    <td>{{ $obat->obat_dosis }}</td>
                    <td>
                        <a href="{{url('/admin/hapusobat/'.$obat->obat_id)}}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
          
        </tbody>
    </table>
</form>

@endsection
