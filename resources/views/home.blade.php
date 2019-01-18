@extends('layouts.app')

@section('content')
    <header class="row">
        <div class="col flex w-full justify-between items-end mt-5 mb-10">
            <p class="text-grey text-base font-normal">Dashboard</p>
    
            <a href="#" disabled v-modal:create-reminder class="button">Customize</a>
        </div>
    </header>

    <div class="row">
        <div class="col w-full">
            <div class="card text-center">Hello Universe.</div>
        </div>
    </div>

@endsection
