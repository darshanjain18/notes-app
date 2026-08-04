<section>

    <header class="mb-4">

        <h3 class="fw-bold">
            Profile Information
        </h3>

        <p class="text-muted">
            Update your account information and email address.
        </p>

    </header>



    <form method="POST" action="{{ route('profile.update') }}">

        @csrf
        @method('PATCH')



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
                type="text"
                name="name"
                class="form-control form-control-lg"
                value="{{ old('name', $user->name) }}"
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

        <div class="mb-4">

            <label 
                for="email"
                class="form-label fw-semibold"
            >
                Email Address
            </label>


            <input
                id="email"
                type="email"
                name="email"
                class="form-control form-control-lg"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            >


            @error('email')

                <div class="text-danger small mt-1">
                    {{ $message }}
                </div>

            @enderror


        </div>



        <div class="d-flex align-items-center gap-3">


            <button 
                type="submit"
                class="btn btn-dark btn-lg rounded-3 px-4"
            >
                Save Changes
            </button>



            @if(session('status') === 'profile-updated')

                <span class="text-success">
                    ✓ Saved successfully
                </span>

            @endif


        </div>


    </form>


</section>