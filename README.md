# Application de Gestion Bancaire MVC

Dans le cadre de la formation "Développeur Web et Web mobile" chez Simplon, ceci est **une application Web de gestion bancaire** suivant **le modèle MVC**. Réalisé avec les langages suivants:

- **HTML**, **CSS** (vues et leur stylisation)
- **JavaScript** (interactions simples, mode sombre)
- **PHP**, **SQL** (modèles, contrôleurs, communication avec la base de données)

Ce projet a été réalisé durant **la semaine du 7 au 11 avril 2025.**

## Contexte et Objectif

Extrait du cahier des charges

```
Une institution bancaire souhaite moderniser la gestion de ses clients, de leurs comptes bancaires et des contrats souscrits (assurances, crédits, épargne, etc.). L'objectif est de développer une application web sécurisée permettant à un administrateur unique de gérer ces connées via une interface ergonomique et fluide.

L'application devra permettre:

- Authentification de l'administrateur pour restreindre l'accès aux fonctionnalités.
- L'enregistrement et la gestion des clients.
- La création et la gestion des comptes bancaires.
- La souscription et la gestion des contrats.

Le projet suivra une méthodologie rigoureuse, incluant une phase de modélisation des données (MERISE) avant le développement en PHP avec une architecture MVC.
```

## Fonctionnalités

🔐 **Authentification de l’administrateur**  

- Connexion sécurisée avec un compte administrateur unique.
- Si un utilisateur essaye d'accéder à des pages en n'étant pas connecté, il sera redirigé vers une page d'erreur, qui elle-même redirige vers la page de connexion.

ℹ️ **Dashboard administrateur**

- La page d'accueil affiche des statistiques liées à la base de données. (nombre de clients, comptes, contrats), ainsi qu'un accès direct à la liste des données.
- Un menu déroulant est présent sur la barre de navigation pour permettre un accès rapide depuis n'importe quelle page du site.

👥 **Gestion des utilisateurs (CRUD)**  

- Création, affichage, modification et suppression de profils utilisateurs.  
- Chaque utilisateur peut être lié à un ou plusieurs comptes bancaires et contrats.
- Supprimer un client supprime également les comptes bancaires et contrats qui lui sont associés (suppression en cascade)

💳📄 **Gestion des comptes bancaires et des contrats (CRUD)**  

- Gestion complète des comptes et des contrats.
- Chaque compte et contrat est lié à un utilisateur spécifique.

🧱 **Architecture MVC propre**  

- Séparation claire des responsabilités entre les modèles (PHP/SQL), les vues (HTML/CSS/JS) et les contrôleurs (PHP).

🌙 **Mode sombre**  

- Possibilité de changer entre un mode sombre et un mode clair (par défaut) via JavaScript.

📱 **Interface responsive**

- Interface adaptée aux différentes tailles d’écran (PC, tablette, mobile).

🔑 **Relations entre entités**  

- Les données sont liées proprement entre utilisateurs, comptes et contrats via des clés étrangères en base de données.

## ⚠️ Limitations connues / Fonctionnalités incomplètes

Ce projet est allé au-delà des consignes en implémentant quelques fonctionnalités bonus (mode sombre, optimisation d'affichage des tables dans un cas plus "pratique").

Cependant, dans la limite du temps, il subsiste toujours certains bugs et autres problèmes mineurs à remarquer:

- Lorsqu'un administrateur ajoute un IBAN qui existe déjà dans la base de données, une erreur s'affiche. Le filtre SQL n'a pas été implémenté à temps.
- Quelques erreurs visuels au niveau du responsive design (page d'un client spécifique: `/views/user/view.php`)
- La sécurisation des données a uniquement été faite en JavaScript (validation des données d'un formulaire) et non en PHP.

## Structure du projet

```md
📂 mvc-bank
├── 📂 assets
│   ├── 📂 images
│   ├── 📂 scripts (JS, formulaires)
│   └── 📂 styles (CSS)
├── 📂 controllers
├── 📂 lib
│   ├── 📄 database.php (connexion à la DB)
│   └── 📄 utils.php (fonctions utiles au code)
├── 📂 merise (fichiers liées à la modélisation des données)
├── 📂 models
├── 📂 views
│   ├── 📂 bank
│   ├── 📂 contract
│   ├── 📂 user
│   └── 📂 templates
├── 📄 .gitignore
├── 📄 index.php
└── 📄 README.md
```

## Installation

### 1 - Cloner le projet

```sh
git clone https://github.com/hojulien/mvc-bank.git
```

### 2 - Créer la base de données + import des tables/données SQL

Via `phpmyadmin` ou `Visual Studio Code`:
- **Créer la base de données** `mvc-banks`
- **Importer dans `mvc-banks` les tables et données** via le fichier `initialisation-db.sql` situé dans le dossier `merise`

Il faudra également lancer `Apache` et `MySQL` sur `XAMPP`.
Le site sera ensuite disponible sur **localhost**.

### 3 - Utilisation du site

Dans les besoins du projet et de test, la connexion se fait via ces identifiants:

```
Adresse e-mail: admin@gmail.com
Mot de passe: 1234
```

Une fois connecté, vous pouvez explorer les différentes fonctionnalités du site.