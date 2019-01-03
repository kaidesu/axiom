@extends('layouts.app')

@section('content')
    <h1>Create a Project</h1>

    <form action="/projects" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            
            <div>
                <input type="text" name="title" placeholder="Title">
            </div>
        </div>

        <div>
            <label for="description">Description</label>
            
            <div>
                <textarea name="description" placeholder="Description"></textarea>
            </div>
        </div>

        <div>
            <button type="submit">Create Project</button>
            <a href="/projects">Cancel</a>
        </div>
    </form>
@endsection