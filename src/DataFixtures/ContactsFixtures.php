<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Factory::create("fr_FR");
        $genre=["male","female"];
        for($i=1;$i<=100;$i++)
        {
            $binaire=mt_rand(0,1);
            if($binaire==0)
            {
                $message="men";
            }
            else
            {
                $message="women";
            }
            $contact=new Contact();
            $contact->setNom($faker->lastName())
                    ->setPrenom($faker->firstName($genre[$binaire]))
                    ->setRue($faker->streetAddress())
                    ->setCp($faker->numberBetween(1000,95000))
                    ->setVille($faker->city())
                    ->setMail($faker->email())
                    ->setAvatar("https://randomuser.me/api/portraits/".$message."/".$i.".jpg")
                    ->setSexe($binaire);
            $manager->persist($contact);
        }

        $manager->flush();
    }
}
