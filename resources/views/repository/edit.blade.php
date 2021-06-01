@extends('layouts.main')

@section('title', 'Data Repository')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 text-gray-800">Data Repository</h1>
        <a href="{{route('repository.index')}}" class="btn btn-sm btn-outline-scondary shadow-sm"><i class="fas fa-arrow-left fa-sm"></i> Kembali</a>
    </div>

    <div class="row">
        @if (Session::has('error'))
        <div class="col-12 mb-2">
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        </div>
        @endif

        <div class="col-md-6">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Dokumen</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('repository.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul Dokumen</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukkan judul dokumen" value="{{ $data->judul }}">
                            @error('judul')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Dokumen</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" placeholder="Masukkan jenis dokumen" value="{{ $data->jenis }}">
                            @error('jenis')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="abstrak">Abstrak</label>
                            <textarea name="abstrak" id="abstrak" cols="30" rows="10" class="form-control @error('abstrak') is-invalid @enderror" placeholder="Masukkan abstrak dokumen" value="{{ old('abstrak')}}">{{$data->abstrak}}</textarea>
                            @error('abstrak')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">File Dokumen</label>
                            <small class="form-text text-muted mb-1">*Upload file dengan format PDF dan ukuran file maksimal 5 MB</small>
                            <input type="file" class="form-control-file" id="file" name="file" accept="application/pdf">
                            <small class="form-text text-muted mb-1">*Abaikan upload file jika tidak ingin mengupdate file</small>
                            @error('file')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Preview Dokumen</h6>
                </div>
                <div class="card-body">
                    <object data="{{asset('dokumen/' . $data->file)}}" type="application/pdf" class="w-100" height="600">
                        <iframe src="https://docs.google.com/viewer?url={{asset('dokumen/' . $data->file)}}&embedded=true"></iframe>
                    </object>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
