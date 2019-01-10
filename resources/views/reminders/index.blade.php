@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-center mb-3 px-6 py-4">
        <h2 class="text-grey text-base font-normal">My Reminders</h2>

        <a href="/reminders/create" class="button">New Reminder</a>
    </header>

    <main class="lg:flex lg:flex-wrap lg:-mx-3 p-6">
        @forelse($reminders as $reminder)
            <div class="lg:w-1/3 lg:px-3 pb-6">
                <div class="bg-white p-5 rounded-lg shadow" style="height: 200px;">
                    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-6 border-purple-light pl-4">
                        {{ $reminder->body }}
                    </h3>

                    <div class="text-grey">

                    </div>
                </div>
            </div>
        @empty
            <div>You have no reminders.</div>
        @endforelse
    </main>

    {{-- @if ($reminders->count())
        <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Reminder</th>
                        <th>Frequency</th>
                        <th>Day</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Run Once?</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($reminders as $reminder)
                        <tr>
                            <td>{{ $reminder->body }}</td>
                            <td>{{ $reminder->frequency }}</td>
                            <td>{{ $reminder->day ?: '-'}}</td>
                            <td>{{ $reminder->date ?: '-' }}</td>
                            <td>{{ $reminder->time ? now()->setTimeFromTimeString($reminder->time)->format('h:i a') : '-' }}</td>
                            <td>{{ $reminder->run_once ? 'Yes' : 'No' }}</td>
                            <td class="text-right">
                                <form action='/reminders/{{ $reminder->id }}' method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-link text-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <hr>

        <p>You have no reminders.</p>
    @endif --}}
@endsection