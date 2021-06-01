@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-register-image" style="background-image: url({{asset('img/login.jpg')}})"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <img src="{{asset('img/polinema.png')}}" alt="" class="img-responsive mb-3" width="150">
                            <h1 class="h4 text-gray-900 mb-4 font-weight-bold">REGISTER</h1>
                            @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                        </div>
                        <form class="user" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username" name="username" required autofocus placeholder="Enter username" value="{{ old('username') }}">
                                @error('username')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" required placeholder="Enter name" value="{{ old('name') }}">
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" required placeholder="Enter email" value="{{ old('email') }}">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Enter password">
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" required placeholder="Enter password confirmation">
                                    @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
