<section class="card bg-base-300"> 
    <header>
        <h2 class="text-lg font-medium text-white-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-white-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')


        <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Current Password</span>
                        </div>
                        <input name="password" id="update_password_current_password" type="password" for="update_password_current_password" placeholder="Password"
                            class="input input-bordered @error('password') input-error @enderror w-full" required autocomplete="current-password"/>
                        <div class="label">
                            @error('updatePassword')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Update Password</span>
                        </div>
                        <input id="update_password_password" name="password" type="password" 
                            class="input input-bordered @error('password') input-error @enderror w-full" autocomplete="new-password"/>
                        <div class="label">
                            @error('updatePassword')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Confirm Password</span>
                        </div>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                            class="input input-bordered @error('password') input-error @enderror w-full" autocomplete="new-password"/>
                        <div class="label">
                            @error('updatePassword')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
