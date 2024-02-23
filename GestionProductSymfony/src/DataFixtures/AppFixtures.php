<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $products=[];
        for ($i = 0; $i < 10; $i++) {
            $products[$i] = new Product();
            $products[$i]->setDescription($faker->sentences(3,true));
            $products[$i]->setPrice($faker->randomFloat(2,1,9999));
            $products[$i]->setUrlImage($faker->imageUrl());
            $manager->persist($products[$i]);
        }

        $manager->flush();
    }
}
