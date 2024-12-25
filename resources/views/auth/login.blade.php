@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="p-8 border rounded-lg shadow-md bg-background-light dark:bg-background-dark group dark:border-gray-700 max-w-[70vw] md:max-w-[25vw] w-full">
        <h1 class="text-2xl font-bold mb-6">Login</h1>

        <form method="POST" action="{{ route('auth.login.submit') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-500 mb-2">Email</label>
                <input type="email" name="email" class="w-full p-2 text-gray-700 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-500 mb-2">Password</label>
                <input type="password" name="password" class="w-full p-2 text-gray-700 border rounded" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                Login
            </button>

            @if ($errors->any())
                <div class="mt-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

        <p class="mt-4 text-center">
            Don't have an account?
            <a href="{{ route('auth.register') }}" class="text-blue-500">Register here</a>
        </p>
    </div>
</div>
@endsection
