@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white max-w-md rounded-lg shadow mx-auto p-6 sm:p-8">
        <h2 class="text-xl font-normal mb-6">
            {{ __('Confirm Password') }}
        </h2>

        <div class="bg-orange-100 text-orange-700 border border-orange-400 rounded mb-4 py-3 px-4" role="alert">
            {{ __('Please confirm your password before continuing.') }}
        </div>

        <form class="text-sm font-bold" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-2" for="password">{{ __('Password') }}</label>
                <input class="bg-white w-full border border-gray-400 @error('password') border-red-500 @enderror appearance-none rounded-lg leading-5 py-2 px-3 focus:outline-none focus:shadow-outline" type="password" name="password" id="password" required autofocus>

                @error('password')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex mb-4">
                <a class="text-blue-600 hover:text-blue-400" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>

            <button class="bg-blue-500 w-full text-white text-base font-bold tracking-wide leading-5 border border-blue-500 rounded-lg py-2 px-6 hover:bg-blue-600 hover:border-blue-600 focus:outline-none focus:shadow-outline" type="submit">
                {{ __('Confirm Password') }}
            </button>
        </form>
    </div>
</div>
@endsection
