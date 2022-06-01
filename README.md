[![Maintainability](https://api.codeclimate.com/v1/badges/5568ce9e6e0258e3d8e2/maintainability)](https://codeclimate.com/github/bibou56/1001pattes/maintainability)


# Refuge 1000 et Une Pattes

## Description du projet :

Vous avez entre les mains mon projet pour la validation du diplôme de **Développeur Intégrateur Web** (RNCP de niveau 5).

Il s'agit du site web d'un refuge animalier fictif dans lequel on peut trouver : 

### Côté Front / visiteurs :
* un accueil 
* une page à propos
* une page adoptions qui emmène vers une page de présentation de chaque espèce (chats et  chiens)
* un blog
* une page de contact 

Ainsi qu'un espace de connexion à un compte personnel, page sur laquelle on peut être dirigé vers une page de création d'un compte. 
Tout le monde peut voir les commentaires mais seules les personnes possédant un compte peuvent écrire des commentaires. 
Les personnes abonnées ont accès à un espace personnel sur lequel elles peuvent voir tous les commentaires qu'elles ont déjà écrit, avec la possibilité de les supprimer.

### Côté Back / administrateur :
* un tableau de bord donnant accès aux mails envoyés depuis le formulaire de contact, mais aussi la liste de toutes les paersonnes ayant un compte
* l'accès aux mêmes pages que les autres utilisateurs avec des accès réservés à l'administrateur connecté, lui permettant d'intervenir sur tous les aspects de son site grâce à des boutons n'apparaissant que lorsqu'un administrateur est connecté (ajout d'éléments, modification, suppression...)

## Technologies : 

* HTML
* CSS
* Javascript
* PHP
* SQL

## Installation :

* Télécharger les fichiers du repository et dézipper le dossier
* Installer composer puis taper la commande 'composer install' dans le répertoire du site
* Vous pouvez créer un nouveau compte utilisateur ou utiliser les identifiants fournis avec l'envoi du projet. Un identifiant également fournis pour la partie administration. Pour vous connecter aussi bien en temps qu'utilisateur ou administrateur, vous devez vous rendre sur la page de connexion accessible depuis la page d'accueil
* Il y a un routeur pour la partie front (index.php) et un router pour le back (indexAdmin.php)

**Adopt don't shop !**

Merci de l'attention portée à ce projet,

Muriel Knockaert