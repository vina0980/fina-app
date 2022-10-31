@extends('admin.admin')
@section('tittle', 'Tambah Siswa')
@section('content-tittle' , 'Tambah siswa')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </ul> 
                    </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{ route('mastersiswa.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" class="form-control" id="nama" name='nama' value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label for="jk">jenis kelamin</label>
                            <select multiple class="form-select form-control" id="jk" name='jk' value="{{ old('jk') }}">
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name='email' value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" class="form-control" id="alamat" name='alamat' value="{{ old('alamat') }}">
                        </div>
                        <div class="form-group">
                            <label for="about">about</label>
                            <input type="text" class="form-control" id="about" name='about' value="{{ old('about') }}">

                        </div>
                        <div class="form-group">
                            <label for="foto">foto siswa</label>
                            <input type="file" class="form-control-file" id="foto" name='foto' value="{{ old('foto') }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="simpan">
                            <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">batal</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection