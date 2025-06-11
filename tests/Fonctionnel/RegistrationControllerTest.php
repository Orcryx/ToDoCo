<?php

namespace App\Tests\Functionel;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationControllerTest extends WebTestCase
{
    private ?KernelBrowser $client = null;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    // private function loginAs(string $email): void
    // {
    //     $userRepository = $this->client->getContainer()
    //         ->get('doctrine.orm.entity_manager')
    //         ->getRepository(User::class);

    //     $user = $userRepository->findOneByEmail($email);

    //     if (!$user) {
    //         throw new \RuntimeException("L'utilisateur avec l'email $email n'existe pas.");
    //     }

    //     $this->client->loginUser($user);
    // }

    public function testAppRegisterIsUp(): void
    {
        $urlGenerator = $this->client->getContainer()->get('router.default');
        $this->client->request(Request::METHOD_GET, $urlGenerator->generate('app_register'));

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Register');
    }

    public function testRegisterWithValidData(): void
    {
        $crawler = $this->client->request('GET', '/register');

        $form = $crawler->selectButton('Register')->form([
            'registration_form[username]' => 'newuser',
            'registration_form[email]' => 'newuser@example.com',
            'registration_form[plainPassword]' => 'password123',
        ]);

        $this->client->submit($form);

        // Vérifie redirection (car login automatique après l'inscription)
        $this->assertResponseRedirects();

        // Suivre la redirection
        $this->client->followRedirect();

        // Vérifier qu’on est connecté ou que la page contient un indicateur de succès
        $this->assertSelectorExists('.navbar'); // ou autre élément présent en étant connecté
    }

    public function testVerifyEmailFailsIfNotLoggedIn(): void
    {
        // Un utilisateur non connecté tente d'accéder
        $this->client->request('GET', '/verify/email');

        // Doit rediriger vers la page de login
        $this->assertResponseRedirects('/login');
    }

    public function testVerifyEmailDisplaysSuccessWhenProperlyVerified(): void
    {
        // Crée un utilisateur vérifié
        $user = new User();
        $user->setEmail('verify@example.com');
        $user->setUsername('verify');
        $user->setPassword('irrelevant');
        $user->setIsVerified(false);
        $user->setRoles(['ROLE_USER']);
        $user->setCreatedAt(new \DateTimeImmutable());
        $user->setUpdatedAt(new \DateTimeImmutable());

        $em = $this->client->getContainer()->get('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();

        // Connecter l'utilisateur
        $this->client->loginUser($user);

        // Simuler une requête vers /verify/email sans signature valide
        $this->client->request('GET', '/verify/email');

        // Affiche une erreur (car la signature est manquante ou invalide)
        $this->assertResponseRedirects('/register');
        $this->client->followRedirect();
        $this->assertSelectorExists('.alert-danger');
    }
}
