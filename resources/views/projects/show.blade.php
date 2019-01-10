@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center mb-3 px-6 py-4">
        <h2 class="text-grey text-base font-normal"><a href="/projects">My Projects</a> / {{ $project->title }}</h2>

        <a href="#" class="button">Invite to Project</a>
    </header>

    <main class="lg:flex lg:flex-wrap lg:-mx-3 p-6">
        <div class="lg:w-2/3 lg:px-3 pb-6">
            <h3 class="font-normal text-xl text-grey">Tasks</h3>
        </div>

        <div class="lg:w-1/3 lg:px-3 pb-6">
            <div class="bg-white p-5 rounded-lg shadow">
                <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-6 border-purple-light pl-4">
                    {{ $project->title }}
                </h3>

                <div class="text-grey leading-normal">{{ $project->description }}</div>
            </div>
        </div>
    </main>
@endsection