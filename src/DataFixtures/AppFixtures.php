<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Task;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {

        // 🔒 Utilisateur anonyme (pas de mot de passe, pas d'auth)
        $anonymousUser = (new User())
            ->setEmail('anonymous@todo.local')
            ->setUsername('Anonyme')
            ->setRoles(['ROLE_USER']) // aucun rôle
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable())
            ->setPassword(''); // vide, inutilisable
        $manager->persist($anonymousUser);

        // Créer un utilisateur admin
        $admin = (new User())
            ->setEmail('admin@example.com')
            ->setUsername('admin')
            ->setRoles(['ROLE_ADMIN'])
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable());
        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, 'adminpass123')
        );
        $manager->persist($admin);

        // 👥 Utilisateurs
        $users = [];

        for ($i = 1; $i <= 5; $i++) {
            $user = (new User())
                ->setEmail("user$i@example.com")
                ->setUsername("user$i")
                ->setRoles(['ROLE_USER'])
                ->setCreatedAt(new \DateTimeImmutable())
                ->setUpdatedAt(new \DateTimeImmutable());
            $user->setPassword(
                $this->passwordHasher->hashPassword($user, "userpass$i")
            );
            $manager->persist($user);
            $users[] = $user;
        }

        // Tâches pour chaque utilisateur
        foreach ($users as $index => $user) {
            for ($j = 1; $j <= 2; $j++) {
                $task = (new Task())
                    ->setTitle("Tâche {$j} de {$user->getUsername()}")
                    ->setContent("Contenu de la tâche $j")
                    ->setIsDone(false)
                    ->setCreatedAt(new \DateTimeImmutable())
                    ->setUpdatedAt(new \DateTimeImmutable())
                    ->setUserId($user);
                $manager->persist($task);
            }
        }

        //  Tâches anonymes (pas de user affecté ou user = "anonyme")
        for ($k = 1; $k <= 3; $k++) {
            $task = (new Task())
                ->setTitle("Tâche anonyme $k")
                ->setContent("Tâche $k sans utilisateur connecté")
                ->setIsDone(false)
                ->setCreatedAt(new \DateTimeImmutable())
                ->setUpdatedAt(new \DateTimeImmutable())
                ->setUserId($anonymousUser); // ou null si tu veux sans user
            $manager->persist($task);
        }

        $manager->flush();
    }
}
