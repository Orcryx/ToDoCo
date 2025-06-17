<?php

namespace App\Tests\Functionel;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
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

    public function testAppUserIsUp(): void
    {

        $this->loginAs('admin@example.com');

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_user'));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello');
    }

    public function testAppProfileIsUpWithAdmin(): void
    {

        $this->loginAs('admin@example.com');

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_profile'));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'profil');
    }

    public function testAppProfileIsUpWithUser(): void
    {

        $this->loginAs('user1@example.com');

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_profile'));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'profil');
    }


    public function testAppUserEditIsUpWithAdmin(): void
    {

        $admin = $this->loginAs('admin@example.com');

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(
            Request::METHOD_GET,
            $urlGenerator->generate('app_user_edit', ['id' => $admin->getId()])
        );

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Modifier les rôles');
    }

    public function testAppUserEditIsUpWithUser(): void
    {

        $user = $this->loginAs('user1@example.com');

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(
            Request::METHOD_GET,
            $urlGenerator->generate('app_user_edit', ['id' => $user->getId()])
        );

        $this->assertResponseStatusCodeSame(403); // Forbidden
    }

    public function testAppUserEditIsAllowedForAdmin(): void
    {
        $admin = $this->loginAs('admin@example.com');

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(
            Request::METHOD_GET,
            $urlGenerator->generate('app_user_edit', ['id' => $admin->getId()])
        );

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Modifier les rôles');
    }

    public function testAppProfileUpdateWithValidData(): void
    {
        $user = $this->loginAs('user1@example.com');

        $urlGenerator = $this->client->getContainer()->get('router.default');
        $crawler = $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_profile'));

        $form = $crawler->selectButton('Enregistrer')->form([
            'user_profile_form[email]' => 'user1@example.com',
            'user_profile_form[username]' => 'user1',
            'user_profile_form[plainPassword][first]' => 'newpass123',
            'user_profile_form[plainPassword][second]' => 'newpass123',
        ]);

        $this->client->submit($form);

        $this->assertResponseRedirects($urlGenerator->generate('app_profile'));
        $this->client->followRedirect();
        $this->assertSelectorTextContains('.alert-success', 'Profil mis à jour');
    }
}
