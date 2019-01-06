@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Reminders</h1>

    @include('reminders._form')

    @if ($reminders->count())
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
    @endif
@endsection