@extends('partials.layout') <!-- Extends a layout file for consistent design -->

@section('title', 'Restore Password') <!-- Sets the title of the page to 'Login' -->

@section('content') <!-- Begins the content section for the login page -->
    <div class="container mx-auto"> <!-- A responsive container centered on the page -->
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto"> <!-- Card layout for the form -->
            <div class="card-body"> <!-- Body of the card -->
                <form action="{{ route('password.email') }}" method="POST"> <!-- Form for login submission -->
                    @csrf <!-- CSRF token for security -->
                    <label class="form-control w-full"> <!-- Label for the email input -->
                        <div class="label mb-4 text-sm text-white-600"> <!-- Div to group label text -->       
                        <span>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</span>
                        </div>
                    </label>

                    @csrf <!-- CSRF token for security -->
                    <label class="form-control w-full"> <!-- Label for the email input -->
                        <div class="label"> <!-- Div to group label text -->
                            <span class="label-text">Email</span> <!-- Label text for the email field -->
                        </div>
                        <x-text-input id="email" class="input input-bordered @error('email')" type="email" name="email" :value="old('email')" required autofocus />
                        <div class="label"> <!-- Div to group error messages -->
                            @error('email') <!-- Check for validation errors on email -->
                                <span class="label-text-alt text-error">{{ $message }}</span> <!-- Display the error message if present -->
                            @enderror
                        </div>
                    </label>

                      <div class="flex content-center justify-end gap-2"> <!-- Flexbox for aligning buttons and links -->
                        @if (Route::has('password.request')) <!-- Check if the password reset route exists -->
                            
                        @endif
                        <input type="submit" class="btn btn-primary" value="Email Password Reset Link" /> <!-- Submit button for the login form -->
                    </div>
                </form> <!-- End of the form -->
            </div> <!-- End of card body -->
        </div> <!-- End of card -->
    </div> <!-- End of container -->
@endsection <!-- End of the content section -->
