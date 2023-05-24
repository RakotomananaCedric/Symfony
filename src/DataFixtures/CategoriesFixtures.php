<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Factory::create("fr_FR");
        $categorie1=New Categorie();
        $categorie1->setLibelle("Sport")
                ->setImage("https://cdn.pixabay.com/photo/2020/06/03/17/20/sport-5255744_1280.jpg")
                ->setDescription($faker->sentences(255));
        $categorie2=New Categorie();
        $categorie2->setLibelle("Professionel")
                ->setImage("https://pxhere.com/fr/photo/868210")
                ->setDescription($faker->sentences(255));
        $categorie3=New Categorie();
        $categorie3->setLibelle("Privée")
                ->setImage("https://cdn.pixabay.com/photo/2017/09/28/22/47/blinded-icon-2797396_1280.png")
                ->setDescription($faker->sentences(255));
        $manager->flush();
    }
}
