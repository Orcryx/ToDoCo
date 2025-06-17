# ToDoCo
# BileMo

Présentation
Dépôt Git de BileMo.

Ce projet est le septième projet de la formation Développeur d'application - PHP/Symfony.

BileMo est une entreprise offrant toute une sélection de téléphones mobiles haut de gamme.

Je suis en charge du développement de la vitrine de téléphones mobiles de l’entreprise BileMo. Le business modèle de BileMo n’est pas de vendre directement ses produits sur le site web, mais de fournir à toutes les plateformes qui le souhaitent l’accès au catalogue via une API (Application Programming Interface). Il s’agit donc de vente exclusivement en B2B (business to business).

Il va falloir que j'expose un certain nombre d’API pour que les applications des autres plateformes web puissent effectuer des opérations.


## 🧭 Table des matières

1. [Prérequis](#prérequis)
2. [Installation](#installation)
3. [Documentation](#Documentation)

---

##  📦 Prérequis

-   PHP version 8.3.4 : Le projet est compatible avec PHP8.
-   composer version 2.7.2 : Assurez-vous que Composer est installé pour gérer les dépendances.
-   twig version 3.8.0
-   Symfony 7.2
-   Une BDD (par exemple DBeaver)
-   MySQL : Version recommandée : 8.0.19 ou plus récent.
-   Serveur local : Apache ou un serveur équivalent pour exécuter l’application en local.

---

## ⚙️ Installation

1. **Cloner le dépôt :** 
 - Clonez ce dépôt sur votre machine locale.

2. **Accéder au dossier du projet :**
    ```bash
    - cd projects/
    - git clone ...

3. **Installer les dépendances avec Composer :**
    ```bash
    - composer install

4. **Installer symfony (voir composer.json)**
    ```bash
    - cd my-project/
    - composer install

5. **Variables d'environnement** 
    Si nécessaire, créer le fichier .env.local (et .env.test) et compléter la value pour la liste des variables suivantes : 
    ```bash
    DB_USER=""
    DB_PASSWORD=""
    DB_HOST=""
    DB_PORT=""
    DB_NAME=""
    DB_SERVER_VERSION="8.3"
    DB_CHARSET="utf8mb4"

    DATABASE_URL="mysql://${DB_USER}:${DB_PASSWORD}@${DB_HOST}:${DB_PORT}/${DB_NAME}?serverVersion=${DB_SERVER_VERSION}&charset=${DB_CHARSET}"

6. **Fixtures & Migrations**
    Effectuer la migrations puis installer les fixtures
    ```bash
    php bin/console doctrine:migrations:migrate
    php bin/console doctrine:fixtures:load
---

## Documentation

