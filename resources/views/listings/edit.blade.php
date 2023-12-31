@extends('layout')

@section('title')
    Add a listing
@endsection

@section('content')
    <div>
        <form method="POST" action="/listing/update/{{ $listing->id }}"
            class="max-w-prose bg-gray-700/20 text-center mx-auto my-5 p-5 rounded">
            @csrf
            @method('PUT')

            <h1 class="mb-5 text-2xl font-semibold">Edit a listing</h1>
            <div
                class="relative flex flex-col gap-3 items-center w-full *:space-y-2 *:flex *:flex-col *:items-start *:w-full">
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="w-full" value="{{ $listing->title }}" />

                    @error('title')
                        <x-alert>
                            {{ $message }}
                        </x-alert>
                    @enderror
                </div>
                <div>
                    <label for="company">Company</label>
                    <input type="text" name="company" id="company" class="w-full" value="{{ $listing->company }}" />

                    @error('company')
                        <x-alert>
                            {{ $message }}
                        </x-alert>
                    @enderror
                </div>
                <div>
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="w-full" value="{{ $listing->location }}" />

                    @error('location')
                        <x-alert>
                            {{ $message }}
                        </x-alert>
                    @enderror
                </div>
                <div>
                    <label for="tags">Tags</label>
                    <input type="text" name="tags" id="tags" class="w-full" value="{{ $listing->tags }}" />

                    @error('tags')
                        <x-alert>
                            {{ $message }}
                        </x-alert>
                    @enderror
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" class="w-full">{{ $listing->tags }}</textarea>

                    @error('description')
                        <x-alert>
                            {{ $message }}
                        </x-alert>
                    @enderror
                </div>

                <div class="!items-end mt-3">
                    <button class="button">Add listing</button>
                </div>
            </div>
        </form>
    </div>
@endsection
