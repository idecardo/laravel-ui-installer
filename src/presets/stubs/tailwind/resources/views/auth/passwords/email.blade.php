@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white max-w-md rounded-lg shadow mx-auto p-6 sm:p-8">
        <h2 class="text-xl font-normal mb-6">
            {{ __('Forgot your password?') }}
        </h2>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 border border-green-400 rounded mb-4 py-3 px-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="text-sm font-bold" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-2" for="email">{{ __('Email Address') }}</label>
                <input class="bg-white w-full border border-gray-400 @error('email') border-red-500 @enderror appearance-none rounded-lg leading-5 py-2 px-3 focus:outline-none focus:shadow-outline" type="text" name="email" id="email" value="{{ old('email') }}" autocomplete="email" required autofocus>

                @error('email')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button class="bg-blue-500 w-full text-white text-base font-bold tracking-wide leading-5 border border-blue-500 rounded-lg py-2 px-6 hover:bg-blue-600 hover:border-blue-600 focus:outline-none focus:shadow-outline" type="submit">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
    </div>
</div>
@endsection
