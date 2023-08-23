@extends('appbar')

@section('content')
    <div class="flex flex-col py-4 w-full items-center text-white">
        <h2 class="text-white text-3xl my-2">Your tasks</h2>

        @auth
            @include('components.tasks.tasks')
        @else
            <div class="flex flex-col items-center">
                <h5 class="text-lg">
                    You need to log in to see your tasks!
                </h5>
                <p>
                    <a href="{{ route('login') }}"><b>Login</b></a>
                    or
                    <a href="{{ route('register') }}"><b>Register</b></a>
                </p>
            </div>
        @endauth

    </div>
@endsection
