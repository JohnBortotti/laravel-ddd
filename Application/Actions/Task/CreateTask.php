<?php

Namespace Application\Actions\Task;

use Domain\Task\Interfaces\TaskRepositoryInterface;

class CreateTask
{
    private $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(string $title, string $desription)
    {
        $this->repository->create($title, $desription);
    }
}