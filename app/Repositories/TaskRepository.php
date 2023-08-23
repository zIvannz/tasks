<?php

namespace App\Repositories;

use App\Models\Task;
//use Illuminate\Database\Eloquent\Repository;
use Illuminate\Config\Repository;

class TaskRepository extends Repository
{
    public $task;
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getUserTasks($user_id)
    {
        return $this->task->where('user_id', $user_id)->get();
    }

    public function getTaskById($id, $user_id)
    {
        return $this->task->where('user_id', $user_id)->where('id', $id)->first();
    }

    public function createTask(array $data)
    {
        return $this->task->create($data);
    }

    public function updateTask(array $data, $id)
    {
        return $this->task->find($id)->update($data);
    }

    public function deleteTask($id)
    {
        return $this->task->delete($id);
    }
}
