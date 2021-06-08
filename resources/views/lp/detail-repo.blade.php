@extends('layouts.lp')

@section('title', $repo->judul)

@section('content')

<section class="my-5" style="min-height: 80vh;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h3>Detail Repository</h3>
                <hr>
            </div>
            <div class="col-md-8 mb-3">
                <h1>{{$repo->judul}}</h1>
                <button type="button" class="btn btn-sm btn-info">{{$repo->tipe->name}}</button>
                <div class="d-flex justify-content-between text-secondary mt-2">
                    <small>Author: {{$repo->user->name}}</small>
                    <small>Program Studi: {{$repo->user->prodi}}</small>
                    <small>Jurusan: {{$repo->user->jurusan}}</small>
                </div>
                <hr>
                <p>{{$repo->abstrak}}</p>
                <a href="{{ route('repository.download', $repo->id)}}" class="btn btn-sm btn-danger">Download File</a>
            </div>
            <div class="col-md-4">
                <object data="{{asset('dokumen/' . $repo->file)}}" type="application/pdf" class="w-100" height="600" id="viewerPdf">
                    <iframe src="https://docs.google.com/viewer?url={{asset('dokumen/' . $repo->file)}}&embedded=true"></iframe>
                </object>
            </div>
        </div>
    </div>
</section>

@endsection
