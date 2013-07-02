<?php

namespace Usuario\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\Persistence\ObjectManager;

use Usuario\Entity\User;

class LoadUser extends AbstractFixture
{
    
    public function load(ObjectManager $manager) {
        $user = new User();
        $user->setNome("Isaac Henrique")
                ->setEmail("isaac.musashi@gmail.com")
                ->setPassword(123456)
                ->setActive(true);
        
        $manager->persist($user);
        
        $user = new User();
        $user->setNome("Admin")
                ->setEmail("isaac.musashi@gmail.com")
                ->setPassword(123456)
                ->setActive(true);
        
        $manager->persist($user);
        
        $manager->flush();
    }

}
