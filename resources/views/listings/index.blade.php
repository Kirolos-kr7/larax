@extends('layout')

@section('title')
    Listings
@endsection

@section('content')
    <div class="flex flex-col md:flex-row py-5 gap-5 items-center justify-between">
        <div class="flex items-center gap-2">
            <h1 class=" text-4xl font-semibold">Listings</h1>
            @php
                $tag = Request::get('tag');
                $search = Request::get('search');
            @endphp
            @if ($tag || $search)
                <a href="/"
                    class="flex items-center gap-2 hover:bg-gray-700/50 transition-colors translate-y-1 bg-gray-700 text-sm rounded-full px-3 uppercase py-1 my-2">
                    {{ $tag }}
                    {{ $search }}
                    <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                    </svg>
                </a>
            @endif
        </div>

        <form action="/" class="translate-y-2 w-full md:w-[22rem]">
            <div class="relative flex items-center w-full">
                <input type="text" name="search" id="search" placeholder="Search listings..."
                    class="w-full pl-10 rounded-e-none border-e-0">
                <svg class="w-6 h-6 absolute left-1.5 top-1.5 text-gray-500" data-slot="icon" fill="none"
                    stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path>
                </svg>
                <button class="button rounded-s-none">
                    Search
                </button>
            </div>
        </form>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        @foreach ($listings as $listing)
            <x-listing-card :listing='$listing' />
        @endforeach
    </div>

    <div class="paginate">
        {{ $listings->links() }}
    </div>
@endsection
