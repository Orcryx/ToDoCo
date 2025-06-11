<?php

// namespace App\Tests\Controller;

// use App\Entity\Task;
// use Doctrine\ORM\EntityManagerInterface;
// use Doctrine\ORM\EntityRepository;
// use Symfony\Bundle\FrameworkBundle\KernelBrowser;
// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

// final class TaskControllerTest extends WebTestCase
// {
//     private KernelBrowser $client;
//     private EntityManagerInterface $manager;
//     private EntityRepository $taskRepository;
//     private string $path = '/task/';

//     protected function setUp(): void
//     {
//         $this->client = static::createClient();
//         $this->manager = static::getContainer()->get('doctrine')->getManager();
//         $this->taskRepository = $this->manager->getRepository(Task::class);

//         foreach ($this->taskRepository->findAll() as $object) {
//             $this->manager->remove($object);
//         }

//         $this->manager->flush();
//     }

//     public function testIndex(): void
//     {
//         $this->client->followRedirects();
//         $crawler = $this->client->request('GET', $this->path);

//         self::assertResponseStatusCodeSame(200);
//         self::assertPageTitleContains('Task index');

//         // Use the $crawler to perform additional assertions e.g.
//         // Self::assertSame('Some text on the page', $crawler->filter('.p')->first());
//     }

//     public function testNew(): void
//     {
//         $this->markTestIncomplete();
//         $this->client->request('GET', sprintf('%snew', $this->path));

//         self::assertResponseStatusCodeSame(200);

//         $this->client->submitForm('Save', [
//             'task[title]' => 'Testing',
//             'task[content]' => 'Testing',
//             'task[isDone]' => 'Testing',
//             'task[createdAt]' => 'Testing',
//             'task[updatedAt]' => 'Testing',
//             'task[userId]' => 'Testing',
//         ]);

//         self::assertResponseRedirects($this->path);

//         self::assertSame(1, $this->taskRepository->count([]));
//     }

//     public function testShow(): void
//     {
//         $this->markTestIncomplete();
//         $fixture = new Task();
//         $fixture->setTitle('My Title');
//         $fixture->setContent('My Title');
//         $fixture->setIsDone('My Title');
//         $fixture->setCreatedAt('My Title');
//         $fixture->setUpdatedAt('My Title');
//         $fixture->setUserId('My Title');

//         $this->manager->persist($fixture);
//         $this->manager->flush();

//         $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

//         self::assertResponseStatusCodeSame(200);
//         self::assertPageTitleContains('Task');

//         // Use assertions to check that the properties are properly displayed.
//     }

//     public function testEdit(): void
//     {
//         $this->markTestIncomplete();
//         $fixture = new Task();
//         $fixture->setTitle('Value');
//         $fixture->setContent('Value');
//         $fixture->setIsDone('Value');
//         $fixture->setCreatedAt('Value');
//         $fixture->setUpdatedAt('Value');
//         $fixture->setUserId('Value');

//         $this->manager->persist($fixture);
//         $this->manager->flush();

//         $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

//         $this->client->submitForm('Update', [
//             'task[title]' => 'Something New',
//             'task[content]' => 'Something New',
//             'task[isDone]' => 'Something New',
//             'task[createdAt]' => 'Something New',
//             'task[updatedAt]' => 'Something New',
//             'task[userId]' => 'Something New',
//         ]);

//         self::assertResponseRedirects('/task/');

//         $fixture = $this->taskRepository->findAll();

//         self::assertSame('Something New', $fixture[0]->getTitle());
//         self::assertSame('Something New', $fixture[0]->getContent());
//         self::assertSame('Something New', $fixture[0]->getIsDone());
//         self::assertSame('Something New', $fixture[0]->getCreatedAt());
//         self::assertSame('Something New', $fixture[0]->getUpdatedAt());
//         self::assertSame('Something New', $fixture[0]->getUserId());
//     }

//     public function testRemove(): void
//     {
//         $this->markTestIncomplete();
//         $fixture = new Task();
//         $fixture->setTitle('Value');
//         $fixture->setContent('Value');
//         $fixture->setIsDone('Value');
//         $fixture->setCreatedAt('Value');
//         $fixture->setUpdatedAt('Value');
//         $fixture->setUserId('Value');

//         $this->manager->persist($fixture);
//         $this->manager->flush();

//         $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
//         $this->client->submitForm('Delete');

//         self::assertResponseRedirects('/task/');
//         self::assertSame(0, $this->taskRepository->count([]));
//     }
// }
