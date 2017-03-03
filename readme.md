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

## Ne pas supprimer :

- les fichiers .gitignore qui se trouvent dans les différents répertoires

## pour le front

- les CSS/JS et images sont dans resources/assets et se compile via npm run dev|production
