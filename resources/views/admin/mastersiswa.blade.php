@extends('admin.admin')
@section('tittle', 'Master Siswa')
@section('content-tittle' , 'Master Siswa')
@section('content')
    <a class="btn btn-success" href="{{ route('mastersiswa.create') }}">tambah data</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">no</th>
                                <th scope="col">nama</th>
                                <th scope="col">jenis kelamin</th>
                                <th scope="col">email</th>
                                <th scope="col">alamat</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                    <tbody>

                        @foreach($data as $i => $item)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->alamat }}</td>

                            <td>
                                <a href="{{ route('mastersiswa.show', $item->id )}}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                <a href="{{ route('mastersiswa.edit', $item->id )}}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('mastersiswa.hapus', $item->id )}}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

@endsection