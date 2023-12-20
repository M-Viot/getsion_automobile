# Recrutement 5Team
## Exercice 1
Pour paramétrer le projet, modifier le fichier 'app.php' et renseigner les paramètres suivants:
- DB_USER : Nom de l'utilisateur de la base de données
- DB_PASS : Mot de passe de l'utilisateur de la base de données
- DB_DATABASE : Nom de la base à utiliser
- DB_HOST : Hôte de la base de données

Une fois le fichier sauvegardé, ouvrir un terminal à la racine du projet et lancer les commandes suivantes :<br>
``composer install``<br>
``php -S localhost:8000``

Avant la première connexion, lancer le scprit d'initialisation :<br>
``http://localhost:8000/init.php``<br>
Ce script créé et alimente la table 'car' nécéssaire au projet.

Une fois l'initialisation ok vous pouvez vous rendre sur l'application.<br>
``http://localhost:8000``

*En cas d'échec de l'initailisation, un dump de la table 'car' se trouve à la racine du projet (car.sql)*

## Exercice 2
Le fichier 'script_mots.php' se trouve à la racine du projet et peut éventuellement etre lancé.
``http://localhost:8000/script_mots.php``<br>

## Exercice 3
Les requêtes demandées se trouvent das le fichier 'Requetes.sql' à la racine du projet.
