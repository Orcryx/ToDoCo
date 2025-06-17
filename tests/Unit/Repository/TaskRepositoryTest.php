<?php

namespace App\Tests\Repository;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\ORM\EntityManagerInterface;

class TaskRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager = null;
    private ?TaskRepository $repository = null;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->entityManager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->entityManager->getRepository(Task::class);
    }

    public function testCanSaveAndRetrieveTask(): void
    {
        $task = new Task();
        $task->setTitle('Test Task')
            ->setContent('Some content')
            ->setIsDone(false)
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($task);
        $this->entityManager->flush();

        $taskFromDb = $this->repository->find($task->getId());

        $this->assertInstanceOf(Task::class, $taskFromDb);
        $this->assertSame('Test Task', $taskFromDb->getTitle());
        $this->assertSame('Some content', $taskFromDb->getContent());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
        $this->repository = null;
    }
}
