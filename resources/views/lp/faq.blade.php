@extends('layouts.lp')

@section('title', 'Data Faq')

@section('content')

<section class="my-5" style="min-height: 80vh;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h3>FAQ</h3>
            </div>
            @if ($data->isEmpty())
            <div class="col-12">
                <div class="alert alert-danger">
                    Data faq masih kosong.
                </div>
            </div>
            @else

            @foreach ($data as $item)
            <div class="col-12">
                <div class="accordion" id="accordionExample{{$item->id}}">
                    <div class="card" id="heading{{$item->id}}">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                    {{$item->title}}
                                </button>
                            </h2>
                        </div>

                        <div id="collapse{{$item->id}}" class="collapse" aria-labelledby="heading{{$item->id}}" data-parent="#accordionExample{{$item->id}}">
                            <div class="card-body">
                                {{$item->content}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            <div class="col-12 my-3 text-center">
                {{$data->links('vendor.pagination.bootstrap-4')}}
            </div>
            @endif
        </div>
    </div>
</section>

@endsection
