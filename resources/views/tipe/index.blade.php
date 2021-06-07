@extends('layouts.main')

@section('title', 'Data Tipe Dokumen')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 text-gray-800">Data Tipe Dokumen</h1>
    </div>

    <div class="row">
        <div class="col-12">

            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif

            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tipe Dokumen</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nama Tipe</th>
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
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="{{ route('repository.download', $item->id)}}" class="btn btn-sm btn-info" target="_blank"><i class="fas fa-fw fa-download"></i></a>
                                        <a href="{{ route('repository.edit', $item->id)}}" class="btn btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="{{ route('repository.show', $item->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
                                        <form action="{{route('repository.destroy', $item->id)}}" method="POST" class="d-inline">
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
