# edipme-pierre

## Pré-requis et installation

Pré-requis

    PHP 8
    MySQL
    Composer
    Visual Studio Code
    BeepKeeper Studio
    Symfony CLI
    npm et nodejs

Extensions PHP

Activez ces extensions dans le fichier php.ini :

    curl
    intl
    mbstring
    mysqli
    openssl
    pdo_mysql
    pdo_pgsql
    pdo_sqlite
    sodium
    sqlite3
    xsl

Création du projet
Téléchargement des ressources

La commande suivante va télécharger l'application Symfony et toutes les dépendances :

    symfony new <nom-app> --full

Ex: symfony new sf-app --full
Activation du HTTPS

L'instruction suivante permet d'activer le HTTPS sur votre poste de développement :

    symfony server:ca:install

Configuration d'un nom de domaine (en mode dev)

Selon votre système d'exploitation, configurez le proxy :

    symfony proxy:start (ne pas fermer, ni stopper la commande)
    cd sf-app (A l'intérieur du projet, dans le dossier racine)
    symfony proxy:domain:attach <domaine>

Ex : symfony proxy:domain:attach sf
Démarrage du serveur web

    cd sf-app
    symfony serve

Le projet sera alors disponible à l'adresse suivante après lancement du serveur web : 'https://sf.wip'.

    N'oubliez pas de relancer la commande "symfony proxy:start" si vous l'avez arrêtée !

Installation du package Encore

    cd sf-app
    composer require symfony/webpack-encore-bundle
    npm install

## MakerBundle, création de base de données et débogagge

Installation du MakerBundle

    composer require symfony/maker-bundle --dev

Mise en place de la base de données

    php bin/console doctrine:database:create

Création de votre premier contrôleur

    php bin/console make:controller

Les outils pour déboguer son application
La gestion d'erreurs (Error Handler)

Il sera activé en mode dev. Pour cela, il faut mettre à jour la valeur de APP_ENV à dev dans le fichier .env (autres valeurs : prod, test).
Le Web Profiler

Aussi activé en mode dev, va collecter de l'information pendant la construction de l'application.

Informations de requêtes HTTP, base de données, cache, erreurs ...
Fonctions de déboggage

    dump(), dd()

    Aussi disponible dans les templates, on y reviendra.

Activation de APCu

    Installer l'extension PHP selon votre système d'exploitation.
    Mettre le fichier de l'extension dans le bon dossier qui contient les autres extensions
    Dans le fichier php.ini, ajouter la ligne suivante :

extension=apcu

## Création d'entités et utilisateur (Sécurité)

Création d'entités

    php bin/console make:entity

Création du système utilisateur

    php bin/console make:user

Création du fichier de migration

    php bin/console make:migration

Mise à jour de la base de données

    php bin/console doctrine:migrations:migrate

## Espace public/privé moderne

Création du formulaire de Login

    php bin/console make:controller Login

Mise à jour du fichier security.yaml

security:
    enable_authenticator_manager: true
    password_hashers:
        App\Entity\User:
            algorithm: auto

    providers:
        app_user_provider:
            entity:
                class: App\Entity\User
                property: email
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            lazy: true
            provider: app_user_provider
            form_login:
                login_path: login
                check_path: login
                enable_csrf: true

            logout:
                path: logout
                target: home

    role_hierarchy:
        ROLE_ADMIN: ROLE_USER

    access_control:
        - { path: ^/admin, roles: ROLE_ADMIN }

Création du formulaire de création de comptes

    php bin/console make:registration-form

--------------------------------------------------------------
// Ajouter des images à la table video

--------------------------------------------------------------
symfony console make:entity

 Class name of the entity to create or update (e.g. TinyPizza):
 > Video

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > imageFilename

 Field type (enter ? to see all types) [string]:
 >

 Field length [255]:
 >

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Video.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >


 
  Success! 
 

 Next: When you're ready, create a migration with php bin/console make:migration

 PS C:\Users\DanielC\Desktop\edipme-pierre> php bin/console make:migration


 
  Success! 
 

 Next: Review the new migration "migrations/Version20220628211815.php"
 Then: Run the migration with php bin/console doctrine:migrations:migrate
 See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html
PS C:\Users\DanielC\Desktop\edipme-pierre> php bin/console doctrine:migrations:migrate

 WARNING! You are about to execute a migration in database "edipme-pierre" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
 >

[notice] Migrating up to DoctrineMigrations\Version20220628211815
[notice] finished in 471.8ms, used 20M memory, 1 migrations executed, 1 sql queries

PS C:\Users\DanielC\Desktop\edipme-pierre> 