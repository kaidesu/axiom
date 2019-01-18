@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-end mb-3 px-6 py-4">
        <p class="text-grey text-base font-normal">
            <a href="/projects" class="text-grey text-base font-normal no-underline">My Projects</a> / {{ $project->title }}
        </p>

        <a href="#" class="button button--primary">Invite to Project</a>
    </header>

    <main class="lg:flex lg:flex-wrap lg:-mx-3 p-6">
        <div class="lg:w-3/4 lg:px-3 pb-6">
            <div class="mb-8">
                <h2 class="font-normal text-grey text-lg mb-3">Tasks</h2>

                @foreach($project->tasks as $task)
                    <div class="card mb-3">
                        <form method="POST" action="{{ $task->path() }}">
                            @method('PATCH')
                            @csrf

                            <div class="flex">
                                <input type="text" name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-grey' : '' }}">
                                <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            </div>
                        </form>
                    </div>
                @endforeach
                
                <add-task :project="{{ $project->toJson() }}"></add-task>
            </div>

            <div>
                <h2 class="font-normal text-grey text-lg mb-3">Notes</h2>

                <form action="{{ $project->path() }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <textarea
                        name="notes"
                        id="notes"
                        class="card w-full mb-3"
                        style="min-height: 200px;"
                        placeholder="Anything special you want to make note of?">{{ $project->notes }}</textarea>

                    <button type="submit" class="button">Save Notes</button>
                </form>
            </div>
        </div>

        <div class="lg:w-1/4 lg:px-3 pb-6">
            @include('projects._card')
        </div>
    </main>
@endsection