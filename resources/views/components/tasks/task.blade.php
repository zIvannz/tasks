<div class="w-10/12 bg-gray-900 pt-1 pb-1 pr-2 pl-2 border-2 border-solid border-white rounded-lg my-4">
    <div class="flex justify-between">
        <h5 class="text-lg">{{ $task->title }}</h5>
        <p class="text-base	"><b>{{ $task->status }}</b></p>
    </div>
    <p>
        {{ $task->description }}
    </p>
    <div class="flex justify-between">
        <p class="py-2"><b>Dedline:</b> {{ $task->deadline ?? 'no deadline' }} </p>

        <div class="flex">
            <a href="{{ route('task.show', ['title' => $task->title, 'id' => $task->id]) }}" class="mx-3">Show</a>
            <a href="{{ route('tasks.edit', $task->id) }}" class="mx-3">Edit</a>
        </div>
    </div>
</div>
