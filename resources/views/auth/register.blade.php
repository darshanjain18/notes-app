@extends('layouts.main')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="p-5 shadow rounded-4 bg-white">

                <!-- Header -->

                <div class="text-center mb-4">

                    <h2 class="fw-bold">
                        📒 Notes App
                    </h2>

                    <p class="text-muted mb-1">
                        Create your account.
                    </p>

                </div>



                <!-- Register Form -->

                <form method="POST" action="{{ route('register') }}">

                    @csrf



                    <!-- Name -->

                    <div class="mb-3">

                        <label 
                            for="name" 
                            class="form-label fw-semibold"
                        >
                            Name
                        </label>


                        <input
                            id="name"
                            class="form-control form-control-lg"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                        >


                        @error('name')

                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>




                    <!-- Email -->

                    <div class="mb-3">

                        <label 
                            for="email"
                            class="form-label fw-semibold"
                        >
                            Email Address
                        </label>


                        <input
                            id="email"
                            class="form-control form-control-lg"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
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

                        <label 
                            for="password"
                            class="form-label fw-semibold"
                        >
                            Password
                        </label>


                        <input
                            id="password"
                            class="form-control form-control-lg"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                        >


                        @error('password')

                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>




                    <!-- Confirm Password -->

                    <div class="mb-4">

                        <label 
                            for="password_confirmation"
                            class="form-label fw-semibold"
                        >
                            Confirm Password
                        </label>


                        <input
                            id="password_confirmation"
                            class="form-control form-control-lg"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                        >


                        @error('password_confirmation')

                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>




                    <!-- Button -->

                    <div class="d-grid">

                        <button 
                            type="submit"
                            class="btn btn-dark btn-lg rounded-3"
                        >
                            Create Account
                        </button>

                    </div>


                </form>




                <!-- Login Link -->

                <div class="text-center mt-4">

                    <p class="text-muted mb-0">

                        Already have an account?

                        <a 
                            href="{{ route('login') }}"
                            class="text-decoration-none fw-semibold"
                        >
                            Sign in
                        </a>

                    </p>

                </div>


            </div>

        </div>

    </div>

</div>


@endsection