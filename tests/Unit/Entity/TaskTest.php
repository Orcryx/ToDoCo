<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testTitle(): void
    {
        $task = new Task();
        $task->setTitle('Titre de la tâche');
        $this->assertSame('Titre de la tâche', $task->getTitle());
    }

    public function testContent(): void
    {
        $task = new Task();
        $task->setContent('Contenu de la tâche');
        $this->assertSame('Contenu de la tâche', $task->getContent());
    }

    public function testIsDone(): void
    {
        $task = new Task();
        $task->setIsDone(true);
        $this->assertTrue($task->isDone());

        $task->setIsDone(false);
        $this->assertFalse($task->isDone());
    }

    public function testToggle(): void
    {
        $task = new Task();
        $task->toggle(true);
        $this->assertTrue($task->isDone());

        $task->toggle(false);
        $this->assertFalse($task->isDone());
    }

    public function testCreatedAt(): void
    {
        $task = new Task();
        $now = new \DateTimeImmutable();
        $task->setCreatedAt($now);
        $this->assertSame($now, $task->getCreatedAt());
    }

    public function testUpdatedAt(): void
    {
        $task = new Task();
        $now = new \DateTimeImmutable();
        $task->setUpdatedAt($now);
        $this->assertSame($now, $task->getUpdatedAt());
    }

    public function testUserAssociation(): void
    {
        $task = new Task();
        $user = new User();

        $task->setUserId($user);
        $this->assertSame($user, $task->getUserId());

        $task->setUserId(null);
        $this->assertNull($task->getUserId());
    }
}
