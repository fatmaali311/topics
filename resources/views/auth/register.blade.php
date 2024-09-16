@extends('layouts.app')

@section('content')
    <div class="container my-5 bg-white rounded-3">
        <div class="row">
            <div class="col-md-5 d-none d-md-block img-wrapper">
                <img src="{{ asset('assets/admin/images/rear-view-young-college-student.jpg') }}" alt="Young college student"
                    class="img-fluid" class="img-fluid">
            </div>
            <div class="col-md-7">
                <form method="POST" action="{{ route('register') }}"
                    class="text-center h-100 px-3 d-flex flex-column justify-content-center">
                    @csrf
                    <h3 class="fw-semibold mb-5">REGISTRATION FORM</h3>
                    <div class="form-group d-flex mb-3">
                        <input type="text" placeholder="First Name"
                            class="form-control @error('firstName') is-invalid @enderror" name="firstName"
                            value="{{ old('firstName') }}" required autocomplete="firstName" autofocus
                            aria-label="First Name">
                        <input type="text" placeholder="Last Name"
                            class="form-control @error('lastName') is-invalid @enderror" name="lastName"
                            value="{{ old('lastName') }}" required autocomplete="lastName" aria-label="Last Name">
                        @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" placeholder="Username"
                            class="form-control @error('userName') is-invalid @enderror" name="userName"
                            value="{{ old('userName') }}" required autocomplete="userName" aria-label="Username">
                        <img src="{{ asset('assets/admin/images/user-svgrepo-com.svg') }}" alt="Username icon"
                            class="input-group-text">
                        @error('userName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" placeholder="Email Address"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" aria-label="Email Address">
                        <img src="{{ asset('assets/admin/images/email-svgrepo-com.svg') }}" alt="Email icon"
                            class="input-group-text">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" aria-label="Password">
                        <img src="{{ asset('assets/admin/images/password-svgrepo-com.svg') }}" alt="Password icon"
                            class="input-group-text">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-5">
                        <input type="password" placeholder="Confirm Password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" required autocomplete="new-password" aria-label="Confirm Password">
                        <img src="{{ asset('assets/admin/images/password-svgrepo-com.svg') }}" alt="Confirm Password icon"
                            class="input-group-text">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="btn btn-dark px-5 mb-2">
                        {{ __('Register') }}
                        <img src="{{ asset('assets/admin/images/arrow-sm-right-svgrepo-com.svg') }}" alt="Register arrow">
                    </button>
                    <a href="{{ route('login') }}" class="fw-semibold fs-6 text-decoration-none text-dark">Already have an
                        account?</a>
                </form>
            </div>
        </div>
    </div>
@endsection
