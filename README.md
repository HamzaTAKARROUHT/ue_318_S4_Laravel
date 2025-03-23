# Application de gestion des membres d'un club

## Description
Cette application web développée avec Laravel permet de gérer les membres d'un club. Elle offre des fonctionnalités pour ajouter, modifier, consulter et supprimer des membres.

## Fonctionnalités
- Liste des membres
- Affichage détaillé d'un membre
- Ajout de nouveaux membres
- Modification des informations des membres
- Suppression de membres
- Interface alternative avec CSS personnalisé

## Installation
1. Cloner le dépôt
2. Installer les dépendances : `composer install`
3. Configurer le fichier .env pour la base de données
4. Lancer les migrations : `php artisan migrate`
5. Charger les données de test : `php artisan db:seed`
6. Démarrer le serveur : `php artisan serve --port=8080`

## Routes principales
- Liste des membres : `/membres`
- Liste des membres avec CSS : `/membrescss`

## Auteur
TAKARROUHT Hamza- UE 318 - S4
