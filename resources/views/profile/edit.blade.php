@extends('layouts.main')

@section('content')

<div class="container py-5">


    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Profile Settings
        </h2>

        <p class="text-muted">
            Manage your account information and security settings.
        </p>

    </div>



    <div class="row justify-content-center">

        <div class="col-lg-8">


            <!-- Update Profile Information -->

            <div class="card shadow-sm border-0 rounded-4 mb-4">

                <div class="card-body p-4">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </div>




            <!-- Update Password -->

            <div class="card shadow-sm border-0 rounded-4 mb-4">

                <div class="card-body p-4">

                    @include('profile.partials.update-password-form')

                </div>

            </div>




            <!-- Delete Account -->

            <div class="card shadow-sm border-0 rounded-4 mb-4">

                <div class="card-body p-4">

                    @include('profile.partials.delete-user-form')

                </div>

            </div>


        </div>

    </div>


</div>


@endsection