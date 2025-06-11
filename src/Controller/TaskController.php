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
use Symfony\Component\Security\Http\Attribute\IsGranted as AttributeIsGranted;

#[Route('/task')]
final class TaskController extends AbstractController
{
    #[Route('all/task', name: 'task_list', methods: ['GET'])]
    #[AttributeIsGranted('ROLE_ADMIN')]
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
            $task->setUserId($this->getUser());
            $task->setIsDone(false);
            $now = new \DateTimeImmutable();
            $task->setCreatedAt($now);
            $task->setUpdatedAt($now);
            $entityManager->persist($task);
            $entityManager->flush();
            $this->addFlash('success', 'La tâche a bien été ajoutée.');

            return $this->redirectToRoute('user_task_list', [], Response::HTTP_SEE_OTHER);
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
        $user = $this->getUser();

        if ($task->getUserId() !== $user && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException("Vous n'avez pas le droit de modifier cette tâche.");
        }

        $form = $this->createForm(TaskForm::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task->setUpdatedAt(new \DateTimeImmutable());
            $entityManager->flush();
            $this->addFlash('success', 'La tâche a bien été modifiée.');

            return $this->redirectToRoute('user_task_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('task/edit.html.twig', [
            'task' => $task,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_task_delete', methods: ['POST'])]
    public function delete(Request $request, Task $task, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        if ($task->getUserId() !== $user && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException("Vous n'avez pas le droit de modifier cette tâche.");
        }

        if ($this->isCsrfTokenValid('delete' . $task->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($task);
            $entityManager->flush();
        }
        $this->addFlash('success', 'La tâche a bien été supprimée.');

        return $this->redirectToRoute('user_task_list', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/toggle', name: 'task_toggle', methods: ['POST'])]
    public function toggle(Task $task, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        if ($task->getUserId() !== $user && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException("Vous n'avez pas le droit de modifier cette tâche.");
        }

        $task->toggle(!$task->isDone());
        $task->setUpdatedAt(new \DateTimeImmutable());
        $em->flush();

        $this->addFlash('success', sprintf('La tâche %s a bien été marquée comme faite.', $task->getTitle()));

        return $this->redirectToRoute('user_task_list');
    }

    // TODO : ajouter fonction pour afficher toutes les taches de en fonction de la personne connecté + droits, ce sera la route : app_task_index
    #[Route(name: 'user_task_list', methods: ['GET'])]
    public function list(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        $tasks = $em->getRepository(Task::class)->findBy(['userId' => $user]);

        return $this->render('task/index.html.twig', [
            'tasks' => $tasks,
        ]);
    }
}
