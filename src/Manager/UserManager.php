<?php

namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class UserManager implements UserManagerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(User $user, User $currentUser, bool $flush = true): void
    {
        // Hachage du mot de passe
        $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));

        // Définition de la date de création
        if (!$user->getCreatedAt()) {
            $user->setCreatedAt(new \DateTimeImmutable());
        }

        // Définition de la date de modification
        if (!$user->getUpdatedAt()) {
            $user->setUpdatedAt(new \DateTimeImmutable());
        }

        $this->entityManager->persist($user);
        if ($flush) {
            $this->entityManager->flush();
        }
    }

    public function remove(User $user, bool $flush = true): void
    {
        $this->entityManager->remove($user);
        if ($flush) {
            $this->entityManager->flush();
        }
    }

    public function find(int $id, User $currentUser): ?User
    {
        return $this->entityManager->getRepository(User::class)
            ->createQueryBuilder('u')
            ->where('u.id = :id')
            ->andWhere('u.customer = :customer')
            ->setParameter('id', $id)
            ->setParameter('customer', $currentUser)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAll(User $currentUser, int $page, int $limit): array
    {
        $usersPage = $this->entityManager->getRepository(User::class)
            ->createQueryBuilder('u')
            ->where('u.customer = :customer')
            ->setParameter('customer', $currentUser)
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);
        return $usersPage->getQuery()->getResult();
    }

    public function edit(User $user, bool $flush = true): void
    {
        // Vérifier si le mot de passe a changé avant de le hacher
        if (!password_get_info($user->getPassword())['algo']) {
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));
        }

        // Définition de la date de création
        if (!$user->getCreatedAt()) {
            $user->setCreatedAt(new \DateTimeImmutable());
        }

        // Mise à jour de la date de modification
        $user->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($user);
        if ($flush) {
            $this->entityManager->flush();
        }
    }
}
