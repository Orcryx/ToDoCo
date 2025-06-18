<?php

namespace App\Tests\Functional;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminControllerTest extends WebTestCase
{
    private KernelBrowser|null $client = null;

    public function setUp(): void
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
            throw new \RuntimeException("L'utilisateur avec l'email n'existe pas.");
        }

        $this->client->loginUser($user);
    }

    public function testAppAdminIsUpWithAdministrator()
    {
        $this->loginAs('admin@example.com');
        $urlGenerator = $this->client->getContainer()->get('router.default');

        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_admin'));

        $this->assertResponseStatusCodeSame(Response::HTTP_OK); // Vérifie que le statut HTTP est 200
        $this->assertResponseIsSuccessful(); // Vérifie que le statut HTTP est 200
        $this->assertSelectorTextContains('h1', 'Page d’administration');  //Tester si la page s'ouvre et si elle contient un titre avec au moins le mot "Bienvenue" dans le texte
    }
}
