@extends('layouts.lp')

@section('title', 'About Us')

@section('content')

<section class="my-5" style="min-height: 80vh;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h3>About Us</h3>
            </div>
            <div class="col-md-6">
                <img src="{{asset('img/kampus.jpg')}}" class="img-responsive w-100" alt="">
            </div>
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, voluptas harum aliquid iste iusto blanditiis neque modi repellat ullam cum reiciendis sunt minima laudantium quia molestiae commodi eaque mollitia quae, non obcaecati labore. Earum corporis, dolorum libero architecto nobis, accusamus et aut doloribus aliquam numquam sunt magnam id sapiente porro.</p>
            </div>
        </div>
    </div>
</section>

@endsection
