<?php

namespace Domain\Task\Interfaces;

interface TaskRepositoryInterface
{
    public function get();
    public function getById(string $id);
    public function create(string $title, string $description);
    public function update(string $id, string $title, string $description);
    public function delete(string $id);
}
