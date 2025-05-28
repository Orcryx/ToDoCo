<?php

namespace App\Manager;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class TaskManager implements TaskManagerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function find(int $id): ?Task
    {
        return $this->entityManager->getRepository(Task::class)->find($id);
    }

    public function findAll(int $page, int $limit): array
    {
        $productsPage = $this->entityManager->getRepository(Task::class)
            ->createQueryBuilder('t')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);
        return $productsPage->getQuery()->getResult();
    }
}
