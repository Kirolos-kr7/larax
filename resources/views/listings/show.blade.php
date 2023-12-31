@extends('layout')

@section('title')
    Listing
@endsection

@section('content')
    <div class="flex items-center justify-between gap-3">
        <button onclick="history.back()" class="bg-gray-700 px-2.5 py-1.5 my-3 rounded flex items-center gap-1">
            <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"></path>
            </svg>Back</button>

        @if (auth()->user() && $listing->created_by == auth()->user()->id)
            <div class="flex items-end justify-end flex-1 gap-2">
                <a href="/listing/edit/{{ $listing['id'] }}" class="text-green-500 p-1 -m-1 rounded">
                    <svg class="w-5 h-5" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10">
                        </path>
                    </svg>
                </a>
                <form class="m-0" action="{{ route('listing.destroy', [$listing->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="text-red-500 rounded p-1 -m-1"><svg class="w-5 h-5" fill="none"
                            stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0">
                            </path>
                        </svg>
                    </button>
                </form>
            </div>
        @endif
    </div>

    <div class="flex justify-between gap-2 mt-2">
        <h2 class="text-2xl mb-1">{{ $listing['title'] }}</h2>
        <span class="flex items-center gap-1">
            <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"></path>
            </svg>
            {{ $listing['location'] }}</span>
    </div>
    <h3>{{ $listing['company'] }}</h3>

    <p class="text-gray-400 my-2">{{ $listing['description'] }}</p>

    <x-tags :tags="$listing->tags" />
@endsection
