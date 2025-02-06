<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setEmail($faker->unique()->safeEmail());

            $manager->persist($utilisateur);
        }

        $manager->flush();
    }
}
