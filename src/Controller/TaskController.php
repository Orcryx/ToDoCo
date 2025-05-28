<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskForm;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/task')]
final class TaskController extends AbstractController
{
    #[Route(name: 'task_list', methods: ['GET'])]
    public function index(TaskRepository $taskRepository): Response
    {
        return $this->render('task/index.html.twig', [
            'tasks' => $taskRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_task_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskForm::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($task);
            $entityManager->flush();
            $this->addFlash('success', 'La tâche a bien été ajoutée.');
            return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('task/new.html.twig', ['form' => $form]);
    }

    #[Route('/{id}', name: 'app_task_show', methods: ['GET'])]
    public function show(Task $task): Response
    {
        return $this->render('task/show.html.twig', [
            'task' => $task,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_task_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Task $task, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TaskForm::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'La tâche a bien été modifiée.');
            return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('task/edit.html.twig', [
            'task' => $task,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_task_delete', methods: ['POST'])]
    public function delete(Request $request, Task $task, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $task->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($task);
            $entityManager->flush();
        }
        $this->addFlash('success', 'La tâche a bien été supprimée.');
        return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/toggle', name: 'task_toggle', methods: ['POST'])]
    public function toggle(Task $task, EntityManagerInterface $em): Response
    {
        $task->toggle(!$task->isDone());
        $em->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('task_list');
    }

    // TODO : ajouter fonction pour afficher toutes les taches de en fonction de la personne connecté + droits, ce sera la route : app_task_index
}
