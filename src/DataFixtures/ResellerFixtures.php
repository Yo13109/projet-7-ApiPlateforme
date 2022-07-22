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
                'email' => 'sfr@gmail.com',
                'password' => 'Sfr13109',
                'company'=>'SFR'
            ],
            3 =>  [
                'email' => 'sfr@gmail.com',
                'password' => 'Sfr13109',
                'company'=>'SFR'
            ],
            4 => [
                'email' => 'sfr@gmail.com',
                'password' => 'Sfr13109',
                'company'=>'SFR'
            ],
            5 =>  [
                'email' => 'sfr@gmail.com',
                'password' => 'Sfr13109',
                'company'=>'SFR'
            ],
           
        ];

        foreach ($datas as $resellerData) {
            $reseller = new Reseller();
            $reseller
                ->setEmail($resellerData['email'])
                ->setPassword($this->passwordHasher->hashPassword(
                    $reseller, $resellerData['password'])
                ->setCompany($resellerData['company']);
                
            $manager->persist($reseller);

                $manager->persist($reseller);
                $manager->flush();
    }
}
