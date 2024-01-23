<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $categoryTitles = ['Informatique', 'Bureautique', 'Anglais', 'Securite', 'Management', 'Mediation'];
        $categories = [];

        foreach ($categoryTitles as $title) {
            $category = new Category();
            $category->setTitre($title);
            $category->setDescription($faker->sentence());
            $manager->persist($category);
            $categories[] = $category;
        }

        for ($i = 0; $i <= 30; $i++) {
            $formation = new Formation();
            $formation->setTitre($faker->words(3, true));
            $formation->setResume($faker->sentence());
            $formation->setDescription($faker->paragraph());
            $formation->setDuree($faker->numberBetween(0, 365));
            $formation->setNiveau($faker->randomElement(['débutant', 'intermédiaire', 'expert']));
            $formation->setLieu($faker->randomElement(['présentiel', 'distanciel']));

            $randomCategory = $faker->randomElement($categories);
            $formation->setCategory($randomCategory);

            $manager->persist($formation);
        }

        $manager->flush();
    }
}
