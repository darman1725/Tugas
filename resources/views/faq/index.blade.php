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
        @if (Session::has('success'))
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        </div>
        @endif
        <div class="col-md-4">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah FAQ</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('faq.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Judu</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Masukkan judul faq" value="{{ old('title')}}">
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Konten</label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10" placeholder="Masukkan konten faq"></textarea>
                            @error('content')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data FAQ</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Judul</th>
                                    <th scope="col" class="text-center">Konten</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data->isEmpty())
                                <tr class="text-center">
                                    <td colspan="6">Data masih kosong.</td>
                                </tr>
                                @else
                                @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ ($data ->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}</th>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->content}}</td>
                                    <td>
                                        <a href="{{ route('faq.edit', $item->id)}}" class="btn btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                                        <form action="{{route('faq.destroy', $item->id)}}" method="POST" class="d-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if (!$data->isEmpty())
                        {{$data->links('vendor.pagination.bootstrap-4')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
