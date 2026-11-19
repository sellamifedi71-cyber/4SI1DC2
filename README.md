# EcoJeunes — plateforme d'actions environnementales

Projet pédagogique PHP/MySQL permettant de proposer des actions, de consulter les actions publiées et d'enregistrer les participations.

## Installation

1. Installer XAMPP/WAMP/Laragon avec PHP 8+ et MySQL/MariaDB.
2. Créer la base bdecojeunes puis importer BDECO.sql dans phpMyAdmin.
3. Vérifier les paramètres de connexion dans config.php.
4. Ouvrir index.html depuis le serveur local (ou accueil.html).
5. Les actions de démonstration du dump sont datées de 2026. Pour créer des inscriptions testables, utilisez d'abord Proposer une action avec une date future.

## Fonctionnalités

- Proposition d'action avec création ou réutilisation d'une fiche membre.
- Consultation et filtrage des actions par période et type.
- Inscription d'un membre existant à une action future.
- Prévention des inscriptions en double par la clé primaire composée déjà définie dans BDECO.sql.

## Note sur le schéma

BDECO.sql crée déjà la table participation et ses clés étrangères. Le fichier participation.sql est conservé comme note de compatibilité : il ne faut pas l'importer en plus. Pour rester compatible avec le dump existant, le code utilise le nom de colonne historique datepaticipation.

Les requêtes SQL utilisent des paramètres préparés. Les données utilisateur sont validées côté serveur et échappées avant affichage HTML.
