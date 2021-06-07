@extends('layouts.lp')

@section('title', 'Data Faq')

@section('content')

<section class="my-5" style="min-height: 80vh;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h3>FAQ</h3>
            </div>
            {{-- @if ($repo->isEmpty())
            <div class="col-12">
                <div class="alert alert-danger">
                    Data repository masih kosong.
                </div>
            </div>
            @else
            <div class="col-md-8 offset-md-2 mb-3">
                <form action="" class="w-100">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-10">
                            <div class="form-group w-100">
                                <input type="text" class="form-control w-100 @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukkan judul dokumen" value="{{ old('judul')}}">
            @error('judul')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-2 text-right">
        <button type="submit" class="btn btn-primary btn-block">Cari</button>
    </div>
    </div>
    </form>
    </div>
    @foreach ($repo as $item) --}}
    <div class="col-12">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @endforeach
            <div class="col-12 my-3 text-center">
                {{$repo->links('vendor.pagination.bootstrap-4')}}
    </div>
    @endif --}}
    </div>
    </div>
</section>

@endsection
