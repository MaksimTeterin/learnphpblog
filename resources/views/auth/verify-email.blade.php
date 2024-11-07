@extends('partials.layout')

@section('title', 'Verify Email')

@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
            <div class="label mb-4 text-sm text-white-600">    
                    <span>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</span>
                </div>
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
                <div class="flex content-center justify-end gap-2">
                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                        <input type="submit" class="btn btn-primary" value="Resend Verification Email" />
                </form>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                        <input type="submit" class="btn btn-secondary underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" value="Logout" />
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
