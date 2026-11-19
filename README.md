# EcoJeunes — plateforme d'actions environnementales

Projet pédagogique PHP/MySQL permettant de proposer des actions, de consulter les actions publiées et d'enregistrer les participations.

## Installation

1. Installer XAMPP/WAMP/Laragon avec PHP 8+ et MySQL/MariaDB.
2. Importer le fichier existant `BDECO.sql` dans phpMyAdmin.
3. Importer ensuite `participation.sql` pour créer la table des inscriptions.
4. Vérifier les paramètres de connexion dans `config.php`.
5. Placer le dossier dans le répertoire web local et ouvrir `http://localhost/4SI1DC2/`.

## Fonctionnalités

- Proposition d'action avec fiche membre et validation des champs.
- Consultation et filtrage des actions par période et type.
- Inscription d'un membre à une action existante.
- Prévention des inscriptions en double grâce à une clé primaire composée dans `participation`.

Les requêtes SQL utilisent des paramètres préparés. Les données utilisateur sont validées côté serveur et échappées avant affichage HTML.
