@extends('layouts.main')

@section('title', 'Data FAQ')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 text-gray-800">Data FAQ</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit FAQ</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('faq.update', $data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Judu</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan judul faq" value="{{ $data->title }}">
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Konten</label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10" placeholder="Masukkan konten faq">{{$data->content}}</textarea>
                            @error('content')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
