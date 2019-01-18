@extends('layouts.app')

@section('content')
    <header class="row">
        <div class="col flex w-full justify-between items-end mt-5 mb-10">
            <p class="text-grey text-base font-normal">My Reminders</p>
    
            <a href="#" v-modal:create-reminder class="button button--primary">New Reminder</a>
    </header>

    <main class="lg:flex lg:flex-wrap lg:-mx-3 p-6">
        <div class="w-full lg:px-3">
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
                        <p class="w-full py-2 lg:py-0 lg:w-1/4 flex"><span class="block mr-2 lg:hidden lg:mr-0 font-bold"></span> {{ $reminder->body }}</p>
                        <p class="w-full py-2 lg:py-0 lg:w-1/6 flex lg:justify-start items-center"><span class="block mr-6 lg:hidden lg:mr-0 font-bold text-xs">Frequency</span> {{ $reminder->frequency }}</p>
                        <p class="w-full py-2 lg:py-0 lg:w-1/6 flex lg:justify-center"><span class="block mr-6 lg:hidden lg:mr-0 font-bold text-xs">Day</span> {{ $reminder->day ?: '-'}}</p>
                        <p class="w-full py-2 lg:py-0 lg:w-1/6 flex lg:justify-center"><span class="block mr-6 lg:hidden lg:mr-0 font-bold text-xs">Date</span> {{ $reminder->date ?: '-'}}</p>
                        <p class="w-full py-2 lg:py-0 lg:w-1/6 flex lg:justify-center"><span class="block mr-6 lg:hidden lg:mr-0 font-bold text-xs">Time</span> {{ $reminder->time ? now()->setTimeFromTimeString($reminder->time)->format('h:i a') : '-' }}</p>
                        <div class="w-full py-2 lg:py-0 lg:w-1/6 flex items-center justify-between">
                            <span class="block mr-6 lg:hidden lg:mr-0 font-bold text-xs">Run once?</span>
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

    <create-reminder-modal
        :frequencies="{{ json_encode(\App\Support\Date::frequencies()) }}"
        :days="{{ json_encode(\App\Support\Date::days()) }}"
    ></create-reminder-modal>
@endsection