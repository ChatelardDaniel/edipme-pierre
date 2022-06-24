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

Le projet sera alors disponible à l'adresse suivante après lancement du serveur web : https://sf.wip.

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