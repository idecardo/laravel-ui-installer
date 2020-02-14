@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white max-w-2xl rounded-lg shadow mx-auto p-6 sm:p-8">
        <h2 class="text-xl font-normal mb-6">
            {{ __('Dashboard') }}
        </h2>

        {{ __('You are logged in!') }}
    </div>
</div>
@endsection
