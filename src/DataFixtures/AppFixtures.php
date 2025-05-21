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
        $anonymousUser = new User();
        $anonymousUser->setEmail('anonymous@todo.local');
        $anonymousUser->setUsername('Anonyme');
        $anonymousUser->setRoles(['ROLE_USER']); // aucun rôle
        $anonymousUser->setCreatedAt(new \DateTimeImmutable());
        $anonymousUser->setUpdatedAt(new \DateTimeImmutable());
        $anonymousUser->setPassword(''); // vide, inutilisable
        $manager->persist($anonymousUser);

        // Créer un utilisateur admin
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setUsername('admin');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setCreatedAt(new \DateTimeImmutable());
        $admin->setUpdatedAt(new \DateTimeImmutable());
        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, 'adminpass123')
        );
        $manager->persist($admin);

        // 👥 Utilisateurs
        $users = [];

        for ($i = 1; $i <= 5; $i++) {
            $user = new User();
            $user->setEmail("user$i@example.com");
            $user->setUsername("user$i");
            $user->setRoles(['ROLE_USER']);
            $user->setCreatedAt(new \DateTimeImmutable());
            $user->setUpdatedAt(new \DateTimeImmutable());
            $user->setPassword(
                $this->passwordHasher->hashPassword($user, "userpass$i")
            );
            $manager->persist($user);
            $users[] = $user;
        }

        // Tâches pour chaque utilisateur
        foreach ($users as $index => $user) {
            for ($j = 1; $j <= 2; $j++) {
                $task = new Task();
                $task->setTitle("Tâche {$j} de {$user->getUsername()}");
                $task->setContent("Contenu de la tâche $j");
                $task->setIsDone(false);
                $task->setCreatedAt(new \DateTimeImmutable());
                $task->setUpdatedAt(new \DateTimeImmutable());
                $task->setUserId($user);
                $manager->persist($task);
            }
        }

        //  Tâches anonymes (pas de user affecté ou user = "anonyme")
        for ($k = 1; $k <= 3; $k++) {
            $task = new Task();
            $task->setTitle("Tâche anonyme $k");
            $task->setContent("Tâche $k sans utilisateur connecté");
            $task->setIsDone(false);
            $task->setCreatedAt(new \DateTimeImmutable());
            $task->setUpdatedAt(new \DateTimeImmutable());
            $task->setUserId($anonymousUser); // ou null si tu veux sans user
            $manager->persist($task);
        }

        $manager->flush();
    }
}
