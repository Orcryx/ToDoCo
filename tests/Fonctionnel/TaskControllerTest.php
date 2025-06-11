<?php

namespace App\Tests\Functionel;

use App\Entity\User;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;

class TaskControllerTest extends WebTestCase
{
    private ?KernelBrowser $client = null;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    private function loginAs(string $email): User
    {
        $userRepository = $this->client->getContainer()
            ->get('doctrine.orm.entity_manager')
            ->getRepository(User::class);

        $user = $userRepository->findOneByEmail($email);

        if (!$user) {
            throw new \RuntimeException("L'utilisateur avec l'email $email n'existe pas.");
        }

        $this->client->loginUser($user);
        return $user;
    }

    private function getUserFromEmail(string $email): User
    {
        return $this->client->getContainer()
            ->get('doctrine.orm.entity_manager')
            ->getRepository(User::class)
            ->findOneByEmail($email);
    }

    public function testAppTaskListIsUpWithAdmin(): void
    {
        $this->loginAs('admin@example.com');
        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('task_list'));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Task index');
    }

    public function testAppTaskListIsUpWithUser(): void
    {
        $this->loginAs('user1@example.com');
        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('user_task_list'));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Task index');
    }

    public function testNewTaskPageAccessible(): void
    {
        $this->loginAs('user1@example.com');
        $urlGenerator = $this->client->getContainer()->get('router.default');

        $crawler = $this->client->request('GET', $urlGenerator->generate('app_task_new'));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');
    }

    public function testUserCanViewOwnTask(): void
    {
        $this->loginAs('user1@example.com');

        $taskRepo = $this->client->getContainer()->get('doctrine.orm.entity_manager')->getRepository(Task::class);
        $task = $taskRepo->findOneBy(['userId' => $this->getUserFromEmail('user1@example.com')]);

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request('GET', $urlGenerator->generate('app_task_show', ['id' => $task->getId()]));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Task');
    }

    public function testUserCanEditOwnTask(): void
    {
        $this->loginAs('user1@example.com');
        $taskRepo = $this->client->getContainer()->get('doctrine.orm.entity_manager')->getRepository(Task::class);
        $task = $taskRepo->findOneBy(['userId' => $this->getUserFromEmail('user1@example.com')]);

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $crawler = $this->client->request('GET', $urlGenerator->generate('app_task_edit', ['id' => $task->getId()]));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');
    }

    public function testUserCanDeleteOwnTask(): void
    {
        $this->loginAs('user1@example.com');
        $em = $this->client->getContainer()->get('doctrine.orm.entity_manager');

        $task = new Task();
        $task->setTitle('Temp Task');
        $task->setContent('To be deleted');
        $task->setUserId($this->getUserFromEmail('user1@example.com'));
        $task->setIsDone(false);
        $now = new \DateTimeImmutable();
        $task->setCreatedAt($now);
        $task->setUpdatedAt($now);
        $em->persist($task);
        $em->flush();

        $urlGenerator = $this->client->getContainer()->get('router.default');

        $crawler = $this->client->request('GET', $urlGenerator->generate('app_task_edit', ['id' => $task->getId()]));
        $token = $crawler->filter('input[name="_token"]')->attr('value');

        $this->client->request('POST', $urlGenerator->generate('app_task_delete', ['id' => $task->getId()]), [
            '_token' => $token,
        ]);

        $this->assertResponseRedirects();
    }

    public function testUserCanToggleOwnTask(): void
    {
        $this->loginAs('user1@example.com');
        $taskRepo = $this->client->getContainer()->get('doctrine.orm.entity_manager')->getRepository(Task::class);
        $task = $taskRepo->findOneBy(['userId' => $this->getUserFromEmail('user1@example.com')]);

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request('POST', $urlGenerator->generate('task_toggle', ['id' => $task->getId()]));

        $this->assertResponseRedirects();
    }
}
