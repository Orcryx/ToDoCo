<?php

namespace App\Tests\Repository;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityManagerInterface;

class UserRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager = null;
    private ?UserRepository $repository = null;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->entityManager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->entityManager->getRepository(User::class);
    }

    public function testUpgradePassword(): void
    {
        $user = new User();
        $user->setEmail('user@example.com')
            ->setUsername('TestUser')
            ->setPassword('old_password')
            ->setRoles(['ROLE_USER'])
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $newHashedPassword = 'new_hashed_password';

        $this->repository->upgradePassword($user, $newHashedPassword);

        $updatedUser = $this->repository->find($user->getId());
        $this->assertSame($newHashedPassword, $updatedUser->getPassword());
    }

    public function testUpgradePasswordWithUnsupportedUser(): void
    {
        $this->expectException(UnsupportedUserException::class);

        /** @var \Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface $mock */
        $mock = $this->createMock(\Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface::class);
        $this->repository->upgradePassword($mock, 'irrelevant');
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
        $this->repository = null;
    }
}
