@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white max-w-md rounded-lg shadow mx-auto p-6 sm:p-8">
        <h2 class="text-xl font-normal mb-6">
            {{ __('Register') }}
        </h2>

        <form class="text-sm font-bold" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-2" for="name">{{ __('Name') }}</label>
                <input class="bg-white w-full border border-gray-400 @error('name') border-red-500 @enderror appearance-none rounded-lg leading-5 py-2 px-3 focus:outline-none focus:shadow-outline" type="text" name="name" id="name" value="{{ old('name') }}" autocomplete="name" required autofocus>

                @error('name')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2" for="email">{{ __('Email Address') }}</label>
                <input class="bg-white w-full border border-gray-400 @error('email') border-red-500 @enderror appearance-none rounded-lg leading-5 py-2 px-3 focus:outline-none focus:shadow-outline" type="email" name="email" id="email" value="{{ old('email') }}" required>

                @error('email')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2" for="password">{{ __('Password') }}</label>
                <input class="bg-white w-full border border-gray-400 @error('password') border-red-500 @enderror appearance-none rounded-lg leading-5 py-2 px-3 focus:outline-none focus:shadow-outline" type="password" name="password" id="password" required>

                @error('password')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2" for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input class="bg-white w-full border border-gray-400 appearance-none rounded-lg leading-5 py-2 px-3 focus:outline-none focus:shadow-outline" type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button class="bg-blue-500 w-full text-white text-base font-bold tracking-wide leading-5 border border-blue-500 rounded-lg py-2 px-6 hover:bg-blue-600 hover:border-blue-600 focus:outline-none focus:shadow-outline" type="submit">
                {{ __('Register') }}
            </button>
        </form>
    </div>
</div>
@endsection
