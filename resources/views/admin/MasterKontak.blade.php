@extends('admin.app')
@section('title', 'Master Kontak')
@section('content-title', 'Master Kontak')

@section('konten')
<a class="btn btn-success" href="{{ route('masterkontak.create') }}">Tambah data</a>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Kontak</h6>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">jenis kelamin</th>
                            <th scope="col">email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                <tbody>

                    @foreach ($kontak as $i=> $item)

                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->jenis_kelamin}}</td>
                        <td>{{$item->email}}</td>
                        {{-- <td>{{$item->foto}}</td> --}}
                        <td>
                            <a href="{{ route('masterkontak.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm"> <i class="fas fa-info-circle"></i></a>
                            <a href="{{ route('masterkontak.show', $item->id) }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a>
                            <a href="{{ route('masterkontak.destroy', $item->id) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('yakin ingin menghapus?')"> <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</div>

@endsection

