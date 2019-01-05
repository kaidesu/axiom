@extends('layouts.app')

@section('content')
    <h1>Reminders</h1>

    <table class="table table-responsive">
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
                    <td>{{ $reminder->time }}</td>
                    <td>{{ $reminder->run_once ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="#" class="text-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection