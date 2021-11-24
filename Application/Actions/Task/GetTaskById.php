<?php

namespace Application\Actions\Task;

use Domain\Task\Interfaces\TaskRepositoryInterface;

class GetTaskById 
{
    private $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(string $id)
    {
        return $this->repository->getById($id);
    }
}