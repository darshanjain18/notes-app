@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="display-3 fw-bold">
            📝 Notes App
        </h1>

        <p class="lead text-muted">
            Organize your ideas with Laravel.
        </p>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-5">

                    <h3 class="fw-bold mb-4 text-center">
                        🚀 What this project includes
                    </h3>

                    <div class="row">

                        <div class="col-md-6">

                            <p>✅ CRUD Operations</p>
                            <p>✅ Eloquent ORM</p>
                            <p>✅ Relationships</p>
                            <p>✅ Search & Filters</p>

                        </div>

                        <div class="col-md-6">

                            <p>✅ Soft Deletes</p>
                            <p>✅ Pagination</p>
                            <p>✅ Model Observers</p>
                            <p>✅ Bootstrap 5 UI</p>

                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="text-center text-muted">

                        <small>
                            Built with Laravel 12 • Bootstrap 5 • MySQL
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection