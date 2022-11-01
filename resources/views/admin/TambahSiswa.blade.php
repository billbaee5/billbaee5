@extends('admin.app')
@section('title', 'Tambah Siswa')
@section('content-title', 'Tambah Siswa')
@section('konten')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if(count($errors) >0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('mastersiswa.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama')}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat')}}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">jenis kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin')}}">
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="about">about</label>
                        <input type="text" class="form-control" id="about" name="about" value="{{ old('about')}}">
                    </div>
                    <div class="form-group">
                        <label for="foto">foto siswa</label>
                        <input type="file" class="form-control" id="foto" name="foto" >
                        {{-- @foreach ($data as $item)
                        <img src="{{asset('/template/img/'.$item->foto) }}" width="200" class="img-thumbnail">
                        @endforeach --}}
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="simpan" >
                        <a href="{{route ('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
