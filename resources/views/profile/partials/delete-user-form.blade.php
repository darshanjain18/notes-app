<section>

    <header class="mb-4">

        <h3 class="fw-bold text-danger">
             Danger Zone
        </h3>

        <p class="text-muted">
            Once your account is deleted, all your data will be permanently removed.
            This action cannot be undone.
        </p>

    </header>



    <button 
        type="button"
        class="btn btn-danger btn-lg rounded-3 px-4"
        data-bs-toggle="modal"
        data-bs-target="#deleteAccountModal"
    >
        Delete Account
    </button>




    <!-- Delete Confirmation Modal -->

    <div 
        class="modal fade"
        id="deleteAccountModal"
        tabindex="-1"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content">


                <div class="modal-header">

                    <h5 class="modal-title fw-bold">
                        Confirm Account Deletion
                    </h5>


                    <button 
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>

                </div>




                <div class="modal-body">

                    <p>
                        Are you sure you want to delete your account?
                    </p>

                    <p class="text-danger fw-semibold">
                        This action cannot be reversed.
                    </p>


                    <form method="POST" action="{{ route('profile.destroy') }}">

                        @csrf
                        @method('DELETE')


                        <label 
                            for="password"
                            class="form-label fw-semibold"
                        >
                            Enter your password to confirm
                        </label>


                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-control form-control-lg"
                            placeholder="Password"
                        >


                        @error('password', 'userDeletion')

                            <div class="text-danger small mt-2">
                                {{ $message }}
                            </div>

                        @enderror



                        <div class="mt-4 d-flex justify-content-end gap-2">


                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Cancel
                            </button>



                            <button
                                type="submit"
                                class="btn btn-danger"
                            >
                                Permanently Delete
                            </button>


                        </div>


                    </form>


                </div>


            </div>


        </div>


    </div>


</section>