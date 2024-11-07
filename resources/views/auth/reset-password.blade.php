@extends('partials.layout')

@section('title', 'Restore Password')

@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <form action="{{ route('password.store') }}" method="POST">
                    @csrf


                    <input type="hidden" name="token" value="{{ $request->route('token') }}">


                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <x-text-input id="email" class="input input-bordered @error('email')" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username"/>
                        <div class="label">
                            @error('email')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <x-text-input id="password" class="input input-bordered @error('password')" type="password" name="password" required autocomplete="new-password" />
                        <div class="label">
                            @error('password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Confirm Password</span>
                        </div>
                        <x-text-input id="password_confirmation" class="input input-bordered @error('password')" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <div class="label">
                            @error('password_confirmation')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                    
                    <div class="flex content-center justify-end gap-2">
                        <input type="submit" class="btn btn-primary" value="Reset Password" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
