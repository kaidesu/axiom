<form action="/reminders" method="POST">
    @csrf
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="body">Remind me...</label>
                <input type="text" name="body" id="body" class="form-control">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="frequency">Frequency</label>
                <select name="frequency" id="frequency" class="form-control">
                    @foreach(\App\Support\Date::frequencies() as $value => $frequency)
                        <option value="{{ $value }}">{{ $frequency }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="day">Day</label>
                <select name="day" id="day" class="form-control">
                    <option value="">Choose...</option>
                    @foreach(\App\Support\Date::days() as $value => $day)
                        <option value="{{ $value }}">{{ $day }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="date">Date</label>
                <select name="date" id="date" class="form-control">
                    <option value="">Choose...</option>
                    @for($i = 1; $i < 32; $i++)
                        <option value="{{ $i }}">{{ \App\Support\Date::ordinal($i) }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="time">Time</label>
                @php
                    $times = \App\Support\Date::range('00:00', '24:00');
                @endphp

                <select name="time" id="time" class="form-control">
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
            <div class="form-group">
                <label for="run_once">
                    <input type="checkbox" name="run_once" id="run_once" class="mr-1"> Run only once
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Add Reminder</button>
        </div>
    </div>
</form>