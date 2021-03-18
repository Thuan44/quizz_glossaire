<?php

namespace App\DataFixtures;

use App\Entity\Expressions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExpressionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $expression = new Expressions();
            $expression->setName("Nom de l'expression $i")
                ->setDefinition("Définition de l'expression $i");
                
            $manager->persist($expression);
        }

        $manager->flush();
    }
}
