@extends('layouts.app')

@section('content')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>{{ __("index.reset_password") }}</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item">
                            <a href="{{ route("home") }}">
                                {{ __("index.home") }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ __("index.reset_password") }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    <div class="main_content">
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>{{ __("index.reset_password") }}</h3>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">
                                            {{ __("index.send_password_reset_link") }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
@endsection
