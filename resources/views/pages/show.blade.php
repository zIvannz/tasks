@extends('appbar')

@section('content')
    <div class="flex flex-col py-4 w-full items-center text-white">
        <h2 class="text-white text-3xl my-2">{{ $task->title }}</h2>

        <div class="flex flex-col items-center">
              <p> {{ $task->description }}</p>
        </div>

        <p class="py-2"><b>Dedline:</b>  {{ $task->deadline ?? 'no deadline' }}  </p>

        <a href="{{ route('tasks.edit', $task->id) }}" class="mx-3">Edit</a>

    </div>
@endsection
