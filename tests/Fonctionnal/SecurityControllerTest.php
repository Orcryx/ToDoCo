<?php

namespace App\Tests\Functionel;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends WebTestCase
{
    private ?KernelBrowser $client = null;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testAppLoginIsUp(): void
    {
        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_login'));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'sign in');
    }

    public function testLoginWithValidCredentials(): void
    {
        // Crée un utilisateur vérifié
        $user = new User();
        $user->setEmail('test@example.com');
        $user->setUsername('test');
        $user->setPassword(
            self::getContainer()->get('security.password_hasher')
                ->hashPassword($user, 'password123')
        );
        $user->setIsVerified(false);
        $user->setRoles(['ROLE_USER']);
        $user->setCreatedAt(new \DateTimeImmutable());
        $user->setUpdatedAt(new \DateTimeImmutable());

        $em = $this->client->getContainer()->get('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();


        $this->client->request('GET', '/login');

        $this->client->submitForm('Sign in', [
            '_username' => 'test@example.com',
            '_password' => 'password123',
        ]);

        $this->assertResponseRedirects('/');
        $this->client->followRedirect();
    }


    public function testLoginWithBadCredentials(): void
    {
        $crawler = $this->client->request('GET', '/login');

        $form = $crawler->selectButton('Sign in')->form([
            '_username' => 'user1@example.com',
            '_password' => 'badpassword',
        ]);

        $this->client->submit($form);

        // L'utilisateur reste sur la page de login
        $this->assertResponseRedirects('/login');
        $crawler = $this->client->followRedirect();

        // Le message d'erreur est affiché
        $this->assertSelectorExists('.alert-danger');
    }
}
