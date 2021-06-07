@extends('layouts.main')

@section('title', 'Data Profile')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Profile</h1>
    <div class="row">
        <div class="col-md-8">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif

            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Data Profile</h6>
                        <a href="{{route('profile.edit', Auth::user()->id)}}" class="btn btn-sm btn-primary">Edit</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    @if (Auth::user()->image == null)
                                    <img src="{{asset('img/avatar.png')}}" class="img-thumbnail rounded-circle" width="150" alt="">
                                    @else
                                    <img src="{{asset('user/' . Auth::user()->image)}}" class="img-thumbnail rounded-circle" width="150" alt="">
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Username</div>
                                <div class="col-md-6 font-weight-bold">{{Auth::user()->username}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">NIM</div>
                                <div class="col-md-6 font-weight-bold">{{Auth::user()->nim}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Nama Lengkap</div>
                                <div class="col-md-6 font-weight-bold">{{Auth::user()->name}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Email</div>
                                <div class="col-md-6 font-weight-bold">{{Auth::user()->email}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Nomor HP</div>
                                <div class="col-md-6 font-weight-bold">{{Auth::user()->phone}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Jurusan</div>
                                <div class="col-md-6 font-weight-bold">{{Auth::user()->jurusan}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">Program Studi</div>
                                <div class="col-md-6 font-weight-bold">{{Auth::user()->prodi}}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
