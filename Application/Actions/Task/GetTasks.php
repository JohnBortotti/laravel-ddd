<?php

namespace Application\Actions\Task;

use Domain\Task\Interfaces\TaskRepositoryInterface;

class GetTasks
{
    private $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle()
    {
        return $this->repository->get();
    }
}