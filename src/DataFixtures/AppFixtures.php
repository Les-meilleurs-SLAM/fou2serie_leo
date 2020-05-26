<?php

namespace App\DataFixtures;

use App\Entity\Serie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $uneSerie = new Serie();
            $uneSerie->setTitre("titre$i");
            $uneSerie->setResume("resume$i");
            $uneSerie->setImage("image$i");
            $uneSerie->setEstVue(0);
            $manager->persist($uneSerie);
        }
        $manager->flush();
    }
}
