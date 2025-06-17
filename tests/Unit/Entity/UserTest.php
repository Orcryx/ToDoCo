<?php

namespace App\Tests\Entity;

use App\Entity\User;
use App\Entity\Task;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testEmail(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $this->assertSame('test@example.com', $user->getEmail());
        $this->assertSame('test@example.com', $user->getUserIdentifier());
    }

    public function testRoles(): void
    {
        $user = new User();
        $this->assertContains('ROLE_USER', $user->getRoles());

        $user->setRoles(['ROLE_ADMIN']);
        $roles = $user->getRoles();
        $this->assertContains('ROLE_ADMIN', $roles);
        $this->assertContains('ROLE_USER', $roles);
        $this->assertCount(2, array_unique($roles));
    }

    public function testPassword(): void
    {
        $user = new User();
        $user->setPassword('hashed_password');
        $this->assertSame('hashed_password', $user->getPassword());
    }

    public function testUsername(): void
    {
        $user = new User();
        $user->setUsername('JohnDoe');
        $this->assertSame('JohnDoe', $user->getUsername());
    }

    public function testIsVerified(): void
    {
        $user = new User();
        $this->assertFalse($user->isVerified());

        $user->setIsVerified(true);
        $this->assertTrue($user->isVerified());
    }

    public function testCreatedAt(): void
    {
        $user = new User();
        $now = new \DateTimeImmutable();
        $user->setCreatedAt($now);
        $this->assertSame($now, $user->getCreatedAt());
    }

    public function testUpdatedAt(): void
    {
        $user = new User();
        $now = new \DateTimeImmutable();
        $user->setUpdatedAt($now);
        $this->assertSame($now, $user->getUpdatedAt());
    }

    public function testTasksCollection(): void
    {
        $user = new User();
        $task = new Task();

        // Assumons que Task::setUserId() met à jour le lien inverse
        $user->addTask($task);
        $this->assertTrue($user->getTasks()->contains($task));
        $this->assertSame($user, $task->getUserId());

        $user->removeTask($task);
        $this->assertFalse($user->getTasks()->contains($task));
        $this->assertNull($task->getUserId());
    }
}
