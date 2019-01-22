@extends('layouts.app')

@section('content')
    <header class="row">
        <div class="col flex w-full justify-between items-end mt-5 mb-10">
            <p class="text-grey text-base font-normal">My Notebooks</p>
    
            <a href="#" v-modal:create-notebook class="button button--primary">New Notebook</a>
        </div>
    </header>

    <main class="row items-stretch">
        <div class="col w-1/6 flex flex-no-shrink self-auto">
            @include('notebooks._notebooks')
        </div>

        <div class="col w-1/5 flex flex-no-shrink self-auto">
            <div class="card flex flex-col flex-1">
                <div>
                    <add-note :notebook="{{ $notebook->toJson() }}"></add-note>
                </div>

                @include('notebooks._notes')
            </div>
        </div>

        <div class="col flex-1">
            <div class="card">
                @if ($note)
                    <div class="pb-2 mb-4 border-b-2">
                        {{ $note->title }}
                    </div>

                    <textarea name="body" id="body" class="w-full leading-loose appearance-none min-h-screen focus:outline-none">
                        {{ $note->body }}
                    </textarea>                    
                @else
                    Create a new note to get started.
                @endif
            </div>
        </div>
    </main>

    <create-notebook-modal></create-notebook-modal>
@endsection