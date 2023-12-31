<ul class="flex items-center gap-2 pt-2 text-xs">
    @foreach (explode(',', $tags) as $tag)
        <li>
            <a href="/?tag={{ $tag }}" class="bg-gray-900 rounded-full px-3 uppercase py-1.5 my-2">
                {{ $tag }}
            </a>
        </li>
    @endforeach
</ul>
