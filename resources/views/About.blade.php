@extends('layouts.main')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">
            📚 About Notes App
        </h1>

        <p class="lead text-muted mt-3">
            A simple Laravel application to create, organize and manage notes efficiently.
        </p>
    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-5">

            <h3 class="fw-bold mb-3">
                🚀 Project Overview
            </h3>

            <p class="text-muted fs-5">
                Notes App is built while learning Laravel from scratch.
                It demonstrates CRUD operations, Relationships,
                Search, Soft Deletes, Query Scopes, Observers,
                Pagination and more using Laravel best practices.
            </p>

            <hr class="my-4">

            <h3 class="fw-bold mb-4">
                ✨ Features
            </h3>

            <div class="row g-4">

                <div class="col-md-6">
                    <div class="border rounded-3 p-3 h-100">
                        <h5>📝 Create Notes</h5>
                        <p class="text-muted mb-0">
                            Add new notes with title and description.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-3 h-100">
                        <h5>✏️ Edit Notes</h5>
                        <p class="text-muted mb-0">
                            Update existing notes anytime.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-3 h-100">
                        <h5>🗑️ Soft Delete</h5>
                        <p class="text-muted mb-0">
                            Restore deleted notes whenever needed.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-3 h-100">
                        <h5>🔍 Search</h5>
                        <p class="text-muted mb-0">
                            Search by title, description or author.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-3 h-100">
                        <h5>👤 Relationships</h5>
                        <p class="text-muted mb-0">
                            Every note belongs to a user.
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border rounded-3 p-3 h-100">
                        <h5>📄 Pagination</h5>
                        <p class="text-muted mb-0">
                            Browse notes page by page.
                        </p>
                    </div>
                </div>

            </div>

            <hr class="my-5">

            <div class="text-center">

                <h4 class="fw-bold">
                    🛠 Built With
                </h4>

                <div class="mt-4">

                    <span class="badge bg-danger me-2 p-2">Laravel</span>
                    <span class="badge bg-primary me-2 p-2">Bootstrap</span>
                    <span class="badge bg-success me-2 p-2">MySQL</span>
                    <span class="badge bg-dark me-2 p-2">Eloquent ORM</span>
                    <span class="badge bg-warning text-dark p-2">PHP</span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection