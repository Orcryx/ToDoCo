# ToDo&Co - Directives pour les contributions aux projets

Si vous souhaitez participer à l'amélioration de ce projet, s'il vous  ne le  pas, c'est un projet de formation (fictif).
Mais si  deviez le faire : 

S'il vous  suivez ce guide et  les conditions de participation au projet.

## Conditions préalables

Installer le projet localement en suivant les instructions du [README.md](README.md).

## À propos de Symfony

Ce projet est développé avec le framework Symfony. Veuillez vous référer à [Symfony Documentation](https://symfony.com/doc/current/index.html) 

## Qualité du code

- La qualité du code est surveillée par Codacy, 
[Codacy](https://app.codacy.com/gh/Orcryx/ToDoCo/dashboard)

- Codacy analysera automatiquement votre Pull Request pour la qualité du code.

- Objectif : médaille B ou mieux.

- Veuillez également exécuter la commande suivante pour vous assurer que vous répondez aux exigences PSR minimales [PSR-12](https://www.php-fig.org/psr/psr-12/) et [PSR-4](https://www.php-fig.org/psr/psr-4/):

## Test

Les tests unitaires et fonctionnels sont implémentés avec PHPunit. Pour lancer les tests : 

```php bin/phpunit --coverage-html var/coverage
```

## Intégration continue

-   Si nécessaire, créer le fichier .env.local (et .env.test) et compléter la value pour la liste des variables suivantes : 

    ```
    DB_USER=""
    DB_PASSWORD=""
    DB_HOST=""
    DB_PORT=""
    DB_NAME=""
    DB_SERVER_VERSION="8.3"
    DB_CHARSET="utf8mb4"

    DATABASE_URL="mysql://${DB_USER}:${DB_PASSWORD}@${DB_HOST}:${DB_PORT}/${DB_NAME}?serverVersion=${DB_SERVER_VERSION}&charset=${DB_CHARSET}"
    ```

- La couverture du code est supérieure à 70 %. Veuillez garantir ce niveau élevé de couverture des tests.

## PHPUnit en Local

- Nous vous recommandons fortement de tester votre code localement avant de le pousser vers le référentiel.
- Pour exécuter des tests sur votre machine locale, vous avez besoin d'une base de données de test.

 ```
  php bin/console doctrine:database:drop --force --env=test
  php bin/console doctrine:database:create --env=test
  php bin/console doctrine:migrations:migrate --no-interaction --env=test
  php bin/console doctrine:fixtures:load --no-interaction --env=test
 ```

- Créez un fichier « .env.test.local » dans lequel vous pouvez configurer votre variable d’environnement DATABASE_URL avec vos informations d’identification de base de données locale.

- Pour obtenir un rapport de couverture de code, ouvrez avec votre navigateur le fichier : /var/coverage/index.html

## Instructions

- Tout d'abord, consultez les [Problèmes](https://github.com/Orcryx/ToDoCo/issues) pour voir des suggestions d'amélioration de l'application

- Si votre contribution n'est pas incluse dans les issues existants, veuillez créer une nouvelle issue et nous discuterons.

- La branche de déploiement du projet est « main ». Veuillez ne jamais y travailler. Commencez toujours par la branche « dev » pour créer une nouvelle branche.

- Après avoir installé le projet sur votre ordinateur local, créez une nouvelle branche selon la nomenclature :

- 'bugfix/' : pour les modifications/bugs
- 'feature/' : pour une nouvelle fonctionnalité

- Travaillez sur votre propre branche. N'oubliez pas d'implémenter vos propres tests pour tester votre code.

  - Vérifiez que votre code a réussi tous les tests.

- Validez vos modifications : `git commit -m "commit description"`

- Poussez votre branche : `git push -u origin feature/my-feature`

- Si les analyses Codacy ou PHPUnit échouent, veuillez corriger vos bugs, valider et pousser.

## Développeuse

Étudiante - Développeur d'applications PHP / Symfony Openclassrooms

Merci pour votre contribution
