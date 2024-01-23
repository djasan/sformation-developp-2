<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i <= 300; $i++) {
            $formation = new Formation();
            $formation->setTitre($faker->words(3, true));
            $formation->setResume($faker->sentence());
            $formation->setDescription($faker->paragraph());
            $formation->setDuree($faker->numberBetween(0, 365));
            $formation->setNiveau($faker->randomElement(['débutant', 'intermédiaire', 'expert']));
            $formation->setLieu($faker->randomElement(['présentiel', 'distanciel']));

            // Utilisez la méthode persist pour enregistrer l'entité en base de données
            $manager->persist($formation);
        }

        // Utilisez la méthode flush pour exécuter les requêtes SQL
        $manager->flush();
    }
}
