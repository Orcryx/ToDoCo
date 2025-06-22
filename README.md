# ToDoCo

Présentation
Dépôt Git de ToDoCo.

Vous venez d’intégrer une startup dont le cœur de métier est une application permettant de gérer ses tâches quotidiennes. L’entreprise vient tout juste d’être montée, et l’application a dû être développée à toute vitesse pour permettre de montrer à de potentiels investisseurs que le concept est viable (on parle de Minimum Viable Product ou MVP).

Le choix du développeur précédent a été d’utiliser le framework PHP Symfony, un framework que vous commencez à bien connaître ! 

Bonne nouvelle ! ToDo & Co a enfin réussi à lever des fonds pour permettre le développement de l’entreprise et surtout de l’application.

Votre rôle ici est donc d’améliorer la qualité de l’application. La qualité est un concept qui englobe bon nombre de sujets : on parle souvent de qualité de code, mais il y a également la qualité perçue par l’utilisateur de l’application ou encore la qualité perçue par les collaborateurs de l’entreprise, et enfin la qualité que vous percevez lorsqu’il vous faut travailler sur le projet.

Ainsi, pour ce dernier projet de spécialisation, vous êtes dans la peau d’un développeur expérimenté en charge des tâches suivantes :

    l’implémentation de nouvelles fonctionnalités ;
    la correction de quelques anomalies ;
    et l’implémentation de tests automatisés.

Il vous est également demandé d’analyser le projet grâce à des outils vous permettant d’avoir une vision d’ensemble de la qualité du code et des différents axes de performance de l’application.

Il ne vous est pas demandé de corriger les points remontés par l’audit de qualité de code et de performance. Cela dit, si le temps vous le permet, ToDo & Co sera ravi que vous réduisiez la dette technique de cette application.

[Projet](https://openclassrooms.com/fr/paths/500/projects/44/assignment)


## Table des matières

1. [Prérequis](#prérequis)
2. [Installation](#installation)
3. [Utilisation](#Utilisation)
4. [Documentation](#Documentation)

---

## Prérequis

-   PHP version 8.3.4 : Le projet est compatible avec PHP8.
-   composer version 2.7.2 : Assurez-vous que Composer est installé pour gérer les dépendances.
-   twig version 3.8.0
-   Symfony 7.2
-   Une BDD (par exemple DBeaver)
-   MySQL : Version recommandée : 8.0.19 ou plus récent.
-   Serveur local : Apache ou un serveur équivalent pour exécuter l’application en local.
---

## Installation

1. **Cloner le dépôt :** 

 - Clonez ce dépôt sur votre machine locale.

2. **Accéder au dossier du projet :**

    ```

    cd projects/
    git clone 
    
    ```

3. **Installer les dépendances avec Composer :**

    ```

    composer install

    ```

4. **Installer symfony (voir composer.json)**

    ```

    cd my-project/

    composer install

    ```

5. **Variables d'environnement** 

    Si nécessaire, créer le fichier .env.local (et .env.test) et compléter la value pour la liste des variables suivantes : 
    (Pour Mailtrap : Remplacer <USERNAME> et <PASSWORD> par les identifiants fournis dans l'interface Mailtrap, dans la section SMTP Settings de ton inbox.)

    ```

    ###> symfony/mailer ###
    MAILER_DSN=smtp://<USERNAME>:<PASSWORD>@sandbox.smtp.mailtrap.io:2525
    ###< symfony/mailer ###

    DB_USER=""
    DB_PASSWORD=""
    DB_HOST=""
    DB_PORT=""
    DB_NAME=""
    DB_SERVER_VERSION="8.3"
    DB_CHARSET="utf8mb4"

    DATABASE_URL="mysql://${DB_USER}:${DB_PASSWORD}@${DB_HOST}:${DB_PORT}/${DB_NAME}?serverVersion=${DB_SERVER_VERSION}&charset=${DB_CHARSET}"

    ```

6. **Fixtures & Migrations**

    Effectuer la migrations puis installer les fixtures

    ```

    php bin/console doctrine:migrations:migrate

    php bin/console doctrine:fixtures:load
    
    ```

## Utilisation

Pour exécuter le projet :
   
``` 
    - cd my-project/
    - symfony server:start
```

Accédez à l’application dans votre navigateur via http://127.0.0.1:8000/


Utilisateur :

-   Dev
    -   ID : admin@example.com
    -   Mtp : adminpass123
-   User
    -   ID : user1@example.com
    -   Mtp : userpass1

## Documentation

Voir le dossier /documentation :

- [AuditQualitePerformance](/documentation/AuditQualitePerformance.pdf)
- [GuideAuthentification](/documentation/GuideAuthentification.pdf)
- [Diagrammes_UML](/documentation/Diagrammes_ToDoCo.pdf)
- Fichiers HTML de PHPUnit