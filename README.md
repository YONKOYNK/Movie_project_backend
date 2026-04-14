# MOVIE PROJECT - SCRAPING & COLLECTION

## DESCRIPTION
Ce projet est une application PHP permettant de gérer une collection de films en extrayant des données depuis des fichiers HTML locaux (scraping) et en les stockant dans une base de données MySQL.

## FONCTIONNALITÉS
* **Recherche** : Exploration de fichiers HTML de résultats via `accueil.php`.
* **Scraping** : Extraction automatique (Regex) du titre, affiche, durée, date, description et acteurs via `index.php`.
* **Gestion BDD** : Ajout de notes/commentaires et stockage via PDO.
* **Visualisation** : Liste complète de la collection (`allMovies.php`) et fiches détaillées (`movie.php`).

## CONFIGURATION TECHNIQUE
* **Langage** : PHP
* **Base de données** : MySQL (Nom : `Movie_project`)
* **Connexion** : PDO avec requêtes préparées.
* **Design** : CSS pur (fichiers séparés dans le dossier `/stylesss/`).

## AUTEUR DE CE MAGNIFIQUE SCRIPT
Sofiane Lamrani
