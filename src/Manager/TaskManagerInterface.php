<?php

namespace App\Manager;

use App\Entity\Task;

interface TaskManagerInterface
{
    public function find(int $id): ?Task;
    public function findAll(int $page, int $limit): array;
}
