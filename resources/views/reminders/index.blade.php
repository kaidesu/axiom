@extends('layouts.app')

@section('content')
    <header class="flex justify-between items-end mb-3 px-6 py-4">
        <h2 class="text-grey text-base font-normal">My Reminders</h2>

        <a href="/reminders/create" class="button">New Reminder</a>
    </header>

    <main class="lg:flex lg:flex-wrap lg:-mx-3 p-6">
        <div class="w-full px-3">
            @if($reminders->count())
                <div class="hidden lg:flex lg:mb-3 card bg-grey-darkest text-white">
                    <p class="w-1/4 flex"></p>
                    <p class="w-1/6 flex lg:justify-start">Frequency</p>
                    <p class="w-1/6 flex lg:justify-center">Day</p>
                    <p class="w-1/6 flex lg:justify-center">Date</p>
                    <p class="w-1/6 flex lg:justify-center">Time</p>
                    <p class="w-1/6 flex lg:justify-start">Run once?</p>
                </div>

                @foreach($reminders as $reminder)
                    <div class="card mb-3 lg:flex lg:items-center">
                        <p class="w-full lg:w-1/4 flex">{{ $reminder->body }}</p>
                        <p class="w-full lg:w-1/6 flex lg:justify-start">{{ $reminder->frequency }}</p>
                        <p class="w-full lg:w-1/6 flex lg:justify-center">{{ $reminder->day ?: '-'}}</p>
                        <p class="w-full lg:w-1/6 flex lg:justify-center">{{ $reminder->date ?: '-'}}</p>
                        <p class="w-full lg:w-1/6 flex lg:justify-center">{{ $reminder->time ? now()->setTimeFromTimeString($reminder->time)->format('h:i a') : '-' }}</p>
                        <div class="w-full lg:w-1/6 flex items-center justify-between">
                            <span>{{ $reminder->run_once ? 'Yes' : '' }}</span>

                            <form action='/reminders/{{ $reminder->id }}' method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-light no-underline text-xs">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card text-center">You have no reminders.</div>
            @endif
        </div>
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