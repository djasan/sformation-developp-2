# FOAD Symfony

## Activer TLS pour composer

```
composer config --global disable-tls true
composer config --global secure-http false
```

## Projet

Réaliser un site web qui liste des formations.

Une formation doit contenir :
- titre
- résumé
- texte explicatif de la formation
- durée en jour/mois
- niveau : débutant,intermediaire,expert
- lieu : présentiel,distanciel

Le site web consiste est une page qui liste les dernieres formations classé par durée de la formation , de la plus courte à la plus longue.

Réaliser ce site web avec une installation compléte de **Symfony**.

## Git

- Votre travail final se fera dans une branche nommée **developp**
- Vous devrez faire des commits fréquents (**atomiques**) 
- Travailler dans des branches , une branche par fonctionnalité

## Design

Utiliser le framework css **bosstrap** pour effectu afficher les formations sous formes de **cards**.

Bon travail.

---

- Installation d'un Symfony complet

```
symfony new sformation --webapp
```

- Connecter Symfony à votre base de donnée

```
DATABASE_URL="mysql://login:password@127.0.0.1:3306/database?serverVersion=10.11.2-MariaDB&charset=utf8mb4"
```
- Créer la base de donnée

```
symfony console doctrine:database:create
symfony console make:migration ou symfony console doctrine:migrations:diff 
symfony console doctrine:database:migrate
```

- Créer une entitée formation avec les champs :
    - titre string 255
    - resume text
    - description text
    - duree integer
    - niveau string 20
    - lieu string 15

```
symfony console make:entity
```

- Ajout de **fixtures**(jeu de fausses données)

```
composer require --dev doctrine/doctrine-fixtures-bundle
composer require --dev fakerphp/faker
symfony console doctrine:fixture:load
symfony console doctrine:fixture:load --append
```

- Créer un controller Home avec requete

```
symfony console make:controller
```

- Ajouter Bootstrap 

```
composer require twbs/bootstrap:5.3.2
```

- Créer le template de la homepage