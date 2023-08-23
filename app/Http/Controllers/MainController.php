<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    function home() {
        if (Auth::user()) {
            $tasks = $this->taskRepository->getUserTasks(Auth::user()->id);
        }else {
            $tasks = null;
        }


        return view('pages.home', compact('tasks'));
    }

    function show($title, $id) {
        $task = $this->taskRepository->getTaskById($id, Auth::user()->id);
        return view('pages.show', compact('task'));
    }
}
