@extends('layouts.app')

@section('content')
  <div class="py-5">

    <h1 class="display-4 fw-bold mb-4">
        📖 About Notes App
    </h1>

    <div class="card shadow-sm border-0">

        <div class="card-body p-4">

            <p class="fs-5">
                Notes App is a simple Laravel application built to help users
                create, edit, search, and organize their notes efficiently.
            </p>

            <hr>

            <h4>✨ Features</h4>

            <ul class="list-group list-group-flush mt-3">

                <li class="list-group-item">📝 Create Notes</li>

                <li class="list-group-item">✏️ Edit Existing Notes</li>

                <li class="list-group-item">🗑 Soft Delete & Restore</li>

                <li class="list-group-item">🔍 Search Notes</li>

                <li class="list-group-item">👤 User Relationships</li>

                <li class="list-group-item">📄 Pagination</li>

            </ul>

        </div>

    </div>

</div>

@endsection

