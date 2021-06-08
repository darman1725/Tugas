@extends('layouts.lp')

@section('title', 'Home')

@section('content')
<div class="jumbotron jumbotron-fluid" style="height: 500px; background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url({{asset('img/kampus.jpg')}});">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center text-center rounded shadow" style="height: 100%; flex-direction: column; background-color: #000; opacity: 0.5;">
            <h1 class="font-weight-bold text-light">SELAMAT DATANG DI</h1>
            <h2 class="font-weight-bold text-light">SISTEM REPOSITORY KAMPUS POLITEKNIK NEGERI MALANG</h2>
        </div>
    </div>
</div>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h3>HIGHLIGHT REPOSITORY</h3>
            </div>
            @if ($repo->isEmpty())
            <div class="col-12">
                <div class="alert alert-danger">
                    Data repository masih kosong.
                </div>
            </div>
            @else
            @foreach ($repo as $item)
            <div class="col-md-6">
                <a href="{{route('lp.detailrepo', $item->id)}}" style="text-decoration: none;">

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-4 p-3">
                                <img src="{{asset('img/polinema.png')}}" class="w-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body text-dark">
                                    <p class="card-text mb-0"><small class="text-muted">{{$item->tipe->name}}</small></p>
                                    <h5 class="card-title">{{$item->judul}}</h5>
                                    <p class="card-text">{{ strlen($item->abstrak) > 40 ? substr($item->abstrak, 0, 40) . '...' : $item->abstrak }}</p>
                                    <p class="card-text"><small class="text-muted">Author : {{$item->user->name}}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-12 my-3 text-center">
                <a href="{{route('lp.repo')}}" class="btn btn-sm btn-outline-primary">Lihat semua repository</a>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
