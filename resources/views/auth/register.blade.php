@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col w-full lg:w-2/3 lg:mx-auto">
            <div class="card mt-5 p-10 lg:p-20">
                <h2 class="text-3xl text-center mb-10">Register</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-8">
                        <label class="block text-grey-darker mb-2" for="name">Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('name') }}"
                            required
                            autofocus>
                    </div>

                    <div class="mb-8">
                        <label class="block text-grey-darker mb-2" for="email">Email Address</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('email') }}"
                            required
                            autofocus>
                    </div>

                    <div class="mb-8">
                        <label class="block text-grey-darker mb-2" for="password">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="mb-8">
                        <label class="block text-grey-darker mb-2" for="password_confirmation">Confirm Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="flex items-center">
                        <button type="submit" class="button button--primary mr-4">Register</button>
                        <a href="{{ route('login') }}">Already have an account?</a>
                    </div>
                </form>
            </div>        
        </div>
    </div>
@endsection
