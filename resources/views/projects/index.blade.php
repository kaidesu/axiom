@extends('layouts.app')

@section('content')
    <header class="row">
        <div class="col flex w-full justify-between items-end mt-5 mb-10">
            <p class="text-grey text-base font-normal">My Projects</p>
    
            <a href="#" v-modal:create-project class="button button--primary">New Project</a>
        </div>
    </header>

    <main class="row">
        @forelse($projects as $project)
            <div class="col w-full lg:w-1/3 lg:px-3">
                @include('projects._card')
            </div>
        @empty
            <div>No projects yet.</div>
        @endforelse
    </main>

    <create-project-modal></create-project-modal>
@endsection