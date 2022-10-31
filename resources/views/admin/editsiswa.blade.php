@extends('admin.admin')
@section('tittle', 'Edit Siswa')
@section('content-tittle' , 'Edit siswa')
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

                    <form method="POST" enctype="multipart/form-data" action="{{route('mastersiswa.update',$data->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" class="form-control" id="nama" name='nama' value="{{ $data->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="jk">jenis kelamin</label>
                            <select class="form-select" id="jk" name='jk' value="{{ $data->jk}}">
                                <option value="laki-laki" @if( $data->jk == 'laki-laki') @selected @endif >laki-laki</option>
                                <option value="perempuan" @if( $data->jk == 'perempuan') @selected @endif >perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name='email' value="{{ $data->email}}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" class="form-control" id="alamat" name='alamat' value="{{ $data->alamat}}">
                        </div>
                        <div class="form-group">
                            <label for="about">about</label>
                            <textarea class="form-control" id="about" name='about' value="{{ $data->about}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto">foto</label>
                            <input type="file" class="form-control-file" id="foto" name='foto' value="{{ $data->foto}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="simpan">
                            <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection