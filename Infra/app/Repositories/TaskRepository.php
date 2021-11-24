<?php

namespace App\Repositories;

use App\Models\Task;
use Domain\Task\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function get()
    {
        return Task::all();
    }

    public function getById(string $id)
    {
        return Task::find($id);
    }

    public function create(string $title, string $description)
    {
        return Task::create([
            'title' => $title,
            'description' => $description
        ]);
    }

    public function update(string $id, string $title, string $description)
    {
        return Task::find($id)
            ->update([
                'title' => $title,
                'description' => $description
            ]);
    }

    public function delete(string $id)
    {
        return Task::destroy($id);
    }
}
