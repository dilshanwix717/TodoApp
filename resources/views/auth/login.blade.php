<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>

    @include('libraries.styles')

</head>
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession



        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex items-center justify-center mt-4 mb-4  ">
                <p><strong>Please sign in!</P>
            </div>

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>


            @if (Route::has('password.request'))
            @endif



            <div class="d-grid gap-2 col-8 mx-auto flex items-center  mt-4">
                <button type="submit" class="btn btn-success w-full">
                    <span class="text-center">{{ __('Log in') }}</span>
                </button>
            </div>

            <div class="flex items-center justify-center mt-4 mb-4  ">
                <p><strong> Don't have an account?
                        <a class="underline text-m text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('register') }}">
                            {{ __('Sign up') }}
                        </a>
                </P>
            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
