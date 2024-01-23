<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i <= 100; $i++) {
            $user = new User();

            $user->setNom($faker->lastName());
            $user->setPrenom($faker->firstName());
            $user->setAge($faker->numberBetween(18, 99));
            $user->setTelephone($faker->randomElement(['0235569852', '0335569852', '0435569852','0535569852']));
            $user->setEmail($faker->email());
            $user->setAdresse($faker->address());
            $user->setRoles([$faker->randomElement(['ROLE_USER', 'ROLE_ADMIN'])]);
            $user->setPassword($faker->password());

            $manager->persist($user);
        }

        $manager->flush();
    }
}
