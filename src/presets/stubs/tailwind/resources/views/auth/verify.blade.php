@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white max-w-2xl rounded-lg shadow mx-auto p-6 sm:p-8">
        <h2 class="text-xl font-normal mb-6">
            {{ __('Verify Your Email Address') }}
        </h2>

        @if (session('resent'))
            <div class="bg-green-100 text-green-700 border border-green-400 rounded mb-4 py-3 px-4" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form class="inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf

            <button class="text-blue-600 hover:text-blue-400" type="submit">
                {{ __('click here to request another') }}
            </button>.
        </form>
    </div>
</div>
@endsection
