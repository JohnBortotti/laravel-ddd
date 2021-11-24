<?php

namespace Application\Actions\Task;

use Domain\Task\Interfaces\TaskRepositoryInterface;

class UpdateTask
{
    private $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        return $this->repository = $repository;
    }

    public function handle(string $id, string $title, string $description)
    {
        return $this->repository->update($id, $title, $description);
    }
}
