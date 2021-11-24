<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Application\Actions\Task\CreateTask;
use Application\Actions\Task\DeleteTask;
use Application\Actions\Task\GetTaskById;
use Application\Actions\Task\GetTasks;
use Application\Actions\Task\UpdateTask;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function get()
    {
        try {
            $tasksRepository = new TaskRepository();
            $action = new GetTasks($tasksRepository);

            return response()->json($action->handle());
        } catch (Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function getById(string $id)
    {
        try {

            $tasksRepository = new TaskRepository();
            $action = new GetTaskById($tasksRepository);
            $task = $action->handle($id);

            if ($task == null) {
                return response(['Task not found'], 404);
            }

            return response()->json($task);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            $tasksRepository = new TaskRepository();
            $action = new CreateTask($tasksRepository);

            $request->validate([
                'title' => ['required', 'unique:tasks', 'min:3'],
                'description' => ['required', 'min:5']
            ]);

            $action->handle($request['title'], $request['description']);

            return response()->json('created', 201);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function update(string $id, Request $request)
    {
        try {
            $tasksRepository = new TaskRepository();
            $action = new UpdateTask($tasksRepository);

            $getByIdAction = new GetTaskById($tasksRepository);

            if (!$getByIdAction->handle($id)) {
                return response(['Task not found'], 404);
            }

            $request->validate([
                'title' => ['required', 'min:3'],
                'description' => ['required', 'min:5']
            ]);

         $action->handle($id, $request['title'], $request['description']);

            return response()->json('updated', 201);
        } catch (Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $tasksRepository = new TaskRepository();
            $deleteAction = new DeleteTask($tasksRepository);

            $getByIdAction = new GetTaskById($tasksRepository);

            if (!$getByIdAction->handle($id)) {
                return response(['Task not found'], 404);
            }

            $deleteAction->handle($id);

            return response()->noContent();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
}
