<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\DataFixtures\ResellerFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CustomerFixtures extends Fixture implements DependentFixtureInterface
{
    
    public function load(ObjectManager $manager): void
    {
        $datas = [
            1 =>    [
                'firstName' => 'Corsi',
                'lastName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07',
                'reseller'=> 3
            ],
            2 =>  [
                'firstName' => 'Corsi',
                'lastName' => 'Christian',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-61-73-77-67',
                'reseller'=> 1
            ],
            3 =>  [
                'firstName' => 'Corsi',
                'lastName' => 'Francine',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-62-68-26-06',
                'reseller'=> 4
            ],
            4 => [
                'firstName' => 'Corsi',
                'lastName' => 'Laura',
                'address' => '18 allee du gymnase',
                'phoneNumber'=>'06-66-67-27-07',
                'reseller'=> 5
            ],
            5 =>  [
                'firstName' => 'Corsi',
                'lastName' => 'Elodie',
                'address' => '29 rue st germain',
                'phoneNumber'=>'06-13-75-59-95',
                'reseller'=> 1
            ],
            6 => [
                'firstName' => 'Gasquet',
                'lastName' => 'Richard',
                'address' => '2 rue jean jaures 69000 Lyon',
                'phoneNumber'=>'07-58-85-69-42',
                'reseller'=> 3
            ],
            7 => [
                'firstName' => 'Zidane',
                'lastName' => 'Zinedine',
                'address' => '2 bat H la castellane 13016 Marseille',
                'phoneNumber'=>'07-30-48-62-65',
                'reseller'=> 2
            ],
            8 =>  [
                'firstName' => 'Perri',
                'lastName' => 'Clement',
                'address' => 'Residence Monge 13120 Gardanne',
                'phoneNumber'=>'06-11-26-45-48',
                'reseller'=> 2
            ],
            9 =>  [
                'firstName' => 'Moreau',
                'lastName' => 'Malcolm',
                'address' => '106 Lot frenes 13320 Bouc bel air',
                'phoneNumber'=>'06-81-58-85-65',
                'reseller'=> 5
            ],
            10 =>  [
                'firstName' => 'Corsi',
                'lastName' => 'Giovann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'07-45-63-42-84',
                'reseller'=> 4

            ],
        ];

        foreach ($datas as $key => $customerData) {
            $customer = new Customer();
           $reseller = $this->getReference('reseller' . $customerData['reseller']);
            $customer
                ->setFirstName($customerData['firstName'])
                ->setLastName($customerData['lastName'])
                ->setAddress($customerData['address'])
                ->setPhoneNumber($customerData['phoneNumber'])
                ->setReseller($reseller);

            
                
            $manager->persist($customer);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            ResellerFixtures::class,
        ];
    }
}
