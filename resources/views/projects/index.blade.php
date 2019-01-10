@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center mb-3 px-6 py-4">
        <h2 class="text-grey text-base font-normal">My Projects</h2>

        <a href="/projects/create" class="button">New Project</a>
    </header>

    <main class="lg:flex lg:flex-wrap lg:-mx-3 p-6">
        @forelse($projects as $project)
            <div class="lg:w-1/3 lg:px-3 pb-6">
                <div class="bg-white p-5 rounded-lg shadow" style="height: 200px;">
                    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-6 border-purple-light pl-4">
                        <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a>
                    </h3>

                    <div class="text-grey">{{ str_limit($project->description, 100) }}</div>
                </div>
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </main>
@endsection