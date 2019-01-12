@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-end mb-3 px-6 py-4">
        <p class="text-grey text-base font-normal">My Projects</p>

        <a href="/projects/create" class="button button--primary">New Project</a>
    </header>

    <main class="lg:flex lg:flex-wrap lg:-mx-3 p-6">
        @forelse($projects as $project)
            <div class="lg:w-1/3 lg:px-3 pb-6">
                @include('projects._card')
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </main>
@endsection