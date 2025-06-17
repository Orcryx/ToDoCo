<?php

namespace App\Tests\Functionel;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
    private ?KernelBrowser $client = null;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    private function loginAs(string $email): void
    {
        $userRepository = $this->client->getContainer()
            ->get('doctrine.orm.entity_manager')
            ->getRepository(User::class);

        $user = $userRepository->findOneByEmail($email);

        if (!$user) {
            throw new \RuntimeException("L'utilisateur avec l'email $email n'existe pas.");
        }

        $this->client->loginUser($user);
    }

    public function testAppHomeIsUp(): void
    {
        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_home'));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Bienvenue');
    }

    public function testAppHomeIsUpWithUser(): void
    {
        $this->loginAs('user1@example.com');

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_home'));

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testAppHomeIsUpWithAdmin(): void
    {
        $this->loginAs('admin@example.com');

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_home'));

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
}
