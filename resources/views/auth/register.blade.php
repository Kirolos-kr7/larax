@extends('layout')

@section('title')
    Register
@endsection

@section('content')
    <div>
        <form method="POST" action="register" class="max-w-prose bg-gray-700/20 text-center mx-auto my-5 p-5 rounded">
            @csrf

            <h1 class="mb-5 text-2xl font-semibold">Register</h1>
            <div
                class="relative flex flex-col gap-3 items-center w-full *:space-y-2 *:flex *:flex-col *:items-start *:w-full">
                <div>
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" class="w-full" value="{{ old('name') }}" />

                    @error('name')
                        <x-alert>
                            {{ $message }}
                        </x-alert>
                    @enderror
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="w-full" value="{{ old('email') }}" />

                    @error('email')
                        <x-alert>
                            {{ $message }}
                        </x-alert>
                    @enderror
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="w-full" />

                    @error('password')
                        <x-alert>
                            {{ $message }}
                        </x-alert>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full" />

                    @error('password_confirmation')
                        <x-alert>
                            {{ $message }}
                        </x-alert>
                    @enderror
                </div>

                <div class="!items-end mt-3">
                    <button class="button">Sign In</button>

                </div>
            </div>
        </form>
    </div>
@endsection
