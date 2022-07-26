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
        $datas = [
            1 =>    [
                'email' => 'sfr@gmail.com',
                'password' => 'Sfr13109',
                'company'=>'SFR'
            ],
            2 =>  [
                'email' => 'free@gmail.com',
                'password' => 'Free13109',
                'company'=>'FREE'
            ],
            3 =>  [
                'email' => 'orange@gmail.com',
                'password' => 'Orange13109',
                'company'=>'ORANGE'
            ],
            4 => [
                'email' => 'bouygues@gmail.com',
                'password' => 'Bouygues13109',
                'company'=>'BOUYGUES'
            ],
            5 =>  [
                'email' => 'sosh@gmail.com',
                'password' => 'Sosh13109',
                'company'=>'SOSH'
            ],
           
        ];

        foreach ($datas as $key => $resellerData) {
            $reseller = new Reseller();
            $reseller
                ->setEmail($resellerData['email'])
                ->setPassword($this->passwordHasher->hashPassword(
                    $reseller, $resellerData['password']))
                ->setCompany($resellerData['company'])
                ;
            $this->addReference('reseller'.$key, $reseller);
                
            $manager->persist($reseller);

                $manager->persist($reseller);
                $manager->flush();
    }
}
}
