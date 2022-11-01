@if ($data->isEmpty())
    <h6 class="text-center">Siswa belum memiliki projek</h6>
@else
    @foreach ($data as $item)
        <div class="card">
            <div class="card-header">
                {{ $item->siswa_id }}
                <h6>Nama Projek</h6>
                {{ $item->nama_projek }}
            </div>
            <div class="card-body">
                <img src="{{asset('/template/img/'.$item->foto) }}" width="200" class="img-thumbnail">
                <br>
                <h6>Tanggal Projek</h6>
                {{ $item->tanggal }}

                <h6>Deskripsi Projek</h6>
                {{ $item->deskripsi }}
            </div>
            <div class="card-footer">
                <a href="{{ route('masterproject.edit', $item->id) }}" class="btn btn-sm btn-warning"> <i class="fas fa-edit"></i></a>
                <a href="{{ route('masterproject.hapus', $item->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>                                    </td>

            </div>
        </div>
    @endforeach
@endif

