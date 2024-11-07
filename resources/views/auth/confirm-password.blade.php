@extends('partials.layout') <!-- Extends a layout file for consistent design -->

@section('title', 'Login') <!-- Sets the title of the page to 'Login' -->

@section('content') <!-- Begins the content section for the login page -->
    <div class="container mx-auto"> <!-- A responsive container centered on the page -->
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto"> <!-- Card layout for the form -->
            <div class="card-body"> <!-- Body of the card -->
            <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input name="password" type="password" placeholder="Password"
                            class="input input-bordered @error('password') input-error @enderror w-full" type="password"
                            name="password" required autocomplete="current-password"/>
                        <div class="label">
                            @error('password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
            </div> <!-- End of card body -->
        </div> <!-- End of card -->
    </div> <!-- End of container -->
@endsection <!-- End of the content section -->
