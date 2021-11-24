<?php

namespace Application\Actions\Task;

use Domain\Task\Interfaces\TaskRepositoryInterface;

class DeleteTask
{
    private $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle($id)
    {
        return $this->repository->delete($id);
    }
}
