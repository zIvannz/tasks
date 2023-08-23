@forelse ($tasks as $task)
   @include('components.tasks.task')
@empty
    <div class="flex flex-col items-center">
        <h5 class="text-lg">
            You have no tasks!
        </h5>
        <a href="{{ route('tasks.create') }}"><b>Create</b></a>
    </div>
@endforelse
