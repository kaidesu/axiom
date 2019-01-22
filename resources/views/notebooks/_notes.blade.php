<ul class="list-reset text-sm">
    @forelse($notes as $note)
        <li class="py-2">
            <a href="{{ $note->path() }}">{{ $note->title }}</a>
        </li>
    @empty
        <li class="py-2 text-center">No notes yet.</li>
    @endforelse
</ul>