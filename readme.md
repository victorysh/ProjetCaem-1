# Projet CAEM

Réalisé par les apprenants Access Code School Besançon

## Technos principales : 

- Laravel : https://laravel.com/
- Backpack : https://laravel-backpack.readme.io/docs

## Installation :

- cloner le dépôt principal : https://github.com/yvestan/ProjetCaem
- créer une base de données et ajouter le dump archive/sql/caem_with_data.sql
- copier le fichier .env.example en .env et modifier les accès à la base de données dedans
- lancer le serveur php artisan serve (qui pointe sur "public") ou créer un Vhost. Attention, le serveur intégré ne gère pas très bien la lib GD

## Ne pas commiter :

- /vendor : qui se recrée avec la commande composer update / ne pas oublier d'ajouter les composants installés en plus dans composer.json
- /node_modules : qui se récrée avec la commande npm install / ne pas oublier d'ajouter les composants installés en plus dans packages.json
- .env : qui sert à indiquer principalement les paramètres de connexion à la base de données.

## Ne pas supprimer :

- les fichiers .gitignore qui se trouvent dans les différents répertoires

## Pour le front :

- les CSS/JS et images sont dans resources/assets et se compile via npm run dev|production


## Règles de nommage des tables :

- Le nom des tables doivent être au pluriel tout en minuscule.
- Le nom des champs de clé étrangère doivent comporter le nom de la table de liaison au singulier tout en minuscule ainsi que « id » à la fin. Exemple : « person_id ».
- Pour plus d’informations : https://laravel.com/docs/5.4/eloquent#eloquent-model-conventions


## Règles de codage :

- Préciser les paramètres d’entrées des fonctions dans les commentaires avant de déclarer la fonction.
- On doit aussi préciser le type que nous retournera la fonction. Exemple : type array.
- Pour plus d’information : https://laravel.com/docs/5.4/contributions#coding-style




