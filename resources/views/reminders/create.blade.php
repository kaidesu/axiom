@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center mb-3 px-6 py-4">
        <h2 class="text-grey text-base font-normal"><a href="/reminders">My Reminders</a> / New Reminder</h2>
    </header>

    <main>
        @include('reminders._form')
    </main>
@endsection