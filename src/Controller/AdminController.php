<?php

// src/Controller/AdminController.php

namespace App\Controller;

use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(UserRepository $userRepository, TaskRepository $taskRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN'); // sécurité d'accès

        $users = $userRepository->findAll();
        $tasks = $taskRepository->findAll();

        return $this->render('admin/index.html.twig', [
            'users' => $users,
            'tasks' => $tasks,
        ]);
    }
}
