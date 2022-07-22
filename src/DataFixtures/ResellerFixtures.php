<?php

namespace App\DataFixtures;

use App\Entity\Reseller;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ResellerFixtures extends Fixture
{
    private $passwordHasher;

        public function __construct(UserPasswordHasherInterface $passwordHasher)
        {
            $this->passwordHasher = $passwordHasher;
        }
        
    public function load(ObjectManager $manager): void
    {
        $reseller = new Reseller();
        
        $reseller
            ->setEmail('sfr@gmail.com')
            
            ->setPassword($this->passwordHasher->hashPassword(
                $reseller,
                'Sfr13109'
            ))
            
            ->setCompany('SFR');
        
            $reseller = new Reseller();
        
            $reseller
                ->setEmail('orange@gmail.com')
                
                ->setPassword($this->passwordHasher->hashPassword(
                    $reseller,
                    'Orange13109'
                ))
                
                ->setCompany('Orange');

        $manager->flush();
    }
}
