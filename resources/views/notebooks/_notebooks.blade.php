<div class="card flex flex-1">
    <ul class="list-reset">
        @forelse($notebooks as $notebook)
            <li class="py-2">
                <a href="{{ $notebook->path() }}">{{ $notebook->title }}</a>
            </li>
        @empty
            <li class="py-2 text-center">No notebooks yet.</li>
        @endforelse
    </ul>
</div>