<form action="/reminders" method="POST">
    @csrf
    
    <div class="row">
        <div class="col w-full">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="body">Remind me...</label>
                <input type="text" name="body" id="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col w-1/2">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="frequency">Frequency</label>
                <select name="frequency" id="frequency" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                    @foreach(\App\Support\Date::frequencies() as $value => $frequency)
                        <option value="{{ $value }}">{{ $frequency }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col w-1/2">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="day">Day</label>
                <select name="day" id="day" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Choose...</option>
                    @foreach(\App\Support\Date::days() as $value => $day)
                        <option value="{{ $value }}">{{ $day }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col w-1/2">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="date">Date</label>
                <select name="date" id="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Choose...</option>
                    @for($i = 1; $i < 32; $i++)
                        <option value="{{ $i }}">{{ \App\Support\Date::ordinal($i) }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="col w-1/2">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="time">Time</label>
                @php
                    $times = \App\Support\Date::range('00:00', '24:00');
                @endphp

                <select name="time" id="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Choose...</option>

                    @foreach($times as $time)
                        <option value="{{ $time->format('H:i') }}">{{ $time->format('h:i a') }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="run_once">
                    <input type="checkbox" name="run_once" id="run_once" class="mr-1"> Run only once
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <button type="submit" class="button">Add Reminder</button>
        </div>
    </div>
</form>