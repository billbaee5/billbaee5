
@extends('admin.app')
@section('title', 'Edit Project')
@section('content-title', 'Edit Project')
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
                <form method="POST" enctype="multipart/form-data" action="{{ route('masterproject.update', $data->id)}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="nama_projek">Nama projek</label>
                        <input type="text" class="form-control" id="nama_projek" name="nama_projek" value="{{ $data->nama_projek}}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $data->deskripsi}}">
                    </div>
                    <div class="form-group">
                        <label for="foto">foto projek</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        <img src="{{asset('/template/img/'.$data->foto) }}" width="200" class=" img-thumbnail">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="simpan" >
                        <a href="{{route ('masterproject.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
