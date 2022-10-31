@if ($data->isEmpty())
    <h6 class="text-center"> siswa belum memiliki project</h6>
@else
    @foreach ($data as $item)
        <div class="card">
            {{ $item->nama_project}}
        </div>
        <div class="card-body">
            <h5> tanggal project :</h5>
            {{ $item->tanggal}}
            <h5> deskripsi project :</h5>
            {{ $item->deskripsi}}
        </div>
        <div class="card-footer">
            <a href="" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
            <a href="" class="btn btn-sm btn-success"><i class="fas fa-trash"></i></a>
        </div>
    </div>
    @endforeach
@endif