@extends('admin.app')
@section('title', 'Show Siswa')
@section('content-title', 'Show Siswa')
@section('konten')
<div class="row">

    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                @if ($data)
                <img src="{{asset('/template/img/'.$data->foto) }}" width="200" class="rounded-circle img-thumbnail">
                <h4>{{$data->nama}}</h4>
                <h4>{{$data->alamat}}</h4>
                <h4>{{$data->email}}</h4>
                @endif
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                <h5><i class="fas fa-fw fa-regular fa-address-book"></i>
                @foreach ($kontak as $item)
                <ul style="list-style: none;">
                   <li><p>{{ $item->jenis_kontak->jenis_kontak }} {{$item->deskripsi}}</p></li>
                </ul>
                @endforeach
                </h5>
            </div>
        </div>
    </div>


    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h4><i class="fa-regular fa-hashtag"></i>
                    ini about</h4>
                <h4>{{ $data->about }}</h4>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <h4><i class="fas fa-fw fa-suitcase"></i>
                    ini projek</h4>
            </div>
        </div>
    </div>
</div>

@endsection
