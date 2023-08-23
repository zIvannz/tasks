<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Task\{CreateRequest, UpdateRequest};

class TaskController extends Controller
{

    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    function index() {
        $tasks = $this->taskRepository->getUserTasks(Auth::user()->id);

        return view('cabinet.tasks', compact('tasks'));
    }

    function create() {

        return view('cabinet.create');
    }

    function store(CreateRequest $request) {
        $request->merge(['user_id' => Auth::user()->id]);
        $this->taskRepository->createTask($request->all());

        return redirect()->route('task.home')->with('Create', 'Task was created');
    }

     function edit($id) {
        $task = $this->taskRepository->getTaskById($id, Auth::user()->id);
        if (empty($task)) {
            abort(404);
        }
        return view('cabinet.edit', compact('task'));
    }

    function update(UpdateRequest $request, $id) {
        $this->taskRepository->updateTask($request->all(), $id);

        return redirect()->route('task.home')->with('Update', 'Task was Updated');
    }

    function destroy(Request $request, $id) {
        $this->taskRepository->deleteTask($id);
        return redirect()->route('task.home');
    }
}
