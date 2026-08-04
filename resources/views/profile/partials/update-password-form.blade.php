<section>

    <header class="mb-4">

        <h3 class="fw-bold">
            Change Password
        </h3>

        <p class="text-muted">
            Keep your account secure by using a strong password.
        </p>

    </header>



    <form method="POST" action="{{ route('password.update') }}">

        @csrf
        @method('PUT')



        <!-- Current Password -->

        <div class="mb-3">

            <label 
                for="current_password"
                class="form-label fw-semibold"
            >
                Current Password
            </label>


            <input
                id="current_password"
                type="password"
                name="current_password"
                class="form-control form-control-lg"
                autocomplete="current-password"
            >


            @error('current_password', 'updatePassword')

                <div class="text-danger small mt-1">
                    {{ $message }}
                </div>

            @enderror

        </div>




        <!-- New Password -->

        <div class="mb-3">

            <label 
                for="password"
                class="form-label fw-semibold"
            >
                New Password
            </label>


            <input
                id="password"
                type="password"
                name="password"
                class="form-control form-control-lg"
                autocomplete="new-password"
            >


            @error('password', 'updatePassword')

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
                Confirm New Password
            </label>


            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                class="form-control form-control-lg"
                autocomplete="new-password"
            >


            @error('password_confirmation', 'updatePassword')

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
                Update Password
            </button>



            @if(session('status') === 'password-updated')

                <span class="text-success">
                    ✓ Password updated
                </span>

            @endif


        </div>


    </form>


</section>