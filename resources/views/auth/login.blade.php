@extends('layouts.main')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center align-items-center">

        <div class="col-md-6 col-lg-5">

            <div class="p-5 shadow rounded-4 bg-white">

                <!-- Logo / Title -->
                <div class="text-center mb-4">

                    <h2 class="fw-bold">
                        📒 Notes App
                    </h2>

                    <p class="text-muted">
                        Welcome back
                    </p>

                    <small class="text-secondary">
                        Continue managing your notes securely.
                    </small>

                </div>


                <!-- Session Status -->
                @if(session('status'))

                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>

                @endif



                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">

                    @csrf


                    <!-- Email -->

                    <div class="mb-3">

                        <label for="email" class="form-label fw-semibold">
                            Email Address
                        </label>


                        <input 
                            id="email"
                            class="form-control form-control-lg"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                        >


                        @error('email')

                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>




                    <!-- Password -->

                    <div class="mb-3">

                        <label for="password" class="form-label fw-semibold">
                            Password
                        </label>


                        <input 
                            id="password"
                            class="form-control form-control-lg"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                        >


                        @error('password')

                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>




                    <!-- Remember Me -->

                    <div class="mb-4 form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="remember"
                            id="remember"
                        >

                        <label 
                            class="form-check-label"
                            for="remember"
                        >
                            Remember me
                        </label>

                    </div>




                    <!-- Login Button -->

                    <div class="d-grid">

                        <button 
                            type="submit"
                            class="btn btn-dark btn-lg rounded-3"
                        >
                            Sign In
                        </button>

                    </div>


                </form>



                <!-- Register Link -->

                <div class="text-center mt-4">

                    <p class="text-muted mb-0">

                        Don't have an account?

                        <a 
                            href="{{ route('register') }}"
                            class="text-decoration-none fw-semibold"
                        >
                            Register here
                        </a>

                    </p>

                </div>


            </div>

        </div>

    </div>

</div>


@endsection