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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Dokumen</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('repository.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul Dokumen</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukkan judul dokumen" value="{{ old('judul')}}">
                            @error('judul')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Dokumen</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" placeholder="Masukkan jenis dokumen" value="{{ old('jenis')}}">
                            @error('jenis')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="abstrak">Abstrak</label>
                            <textarea name="abstrak" id="abstrak" cols="30" rows="10" class="form-control @error('abstrak') is-invalid @enderror" placeholder="Masukkan abstrak dokumen" value="{{ old('abstrak')}}"></textarea>
                            @error('abstrak')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">File Dokumen</label>
                            <small class="form-text text-muted mb-1">*Upload file dengan format PDF dan ukuran file maksimal 5 MB</small>
                            <input type="file" class="form-control-file" id="file" name="file" accept="application/pdf">
                            @error('file')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
