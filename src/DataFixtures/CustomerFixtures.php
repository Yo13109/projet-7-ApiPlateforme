<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Entity\Reseller;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $datas = [
            1 =>    [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'
            ],
            2 =>  [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'
            ],
            3 =>  [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'
            ],
            4 => [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'
            ],
            5 =>  [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'
            ],
            6 => [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'
            ],
            7 => [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'
            ],
            8 =>  [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'
            ],
            9 =>  [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'
            ],
            10 =>  [
                'firstName' => 'Corsi',
                'lasName' => 'Yoann',
                'address' => '106 village des ormeaux 13109 simiane-collongue',
                'phoneNumber'=>'06-66-67-27-07'

            ],
        ];

        foreach ($datas as $customerData) {
            $customer = new Customer();
            $reseller = 'sfr';
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
            Reseller::class,
        ];
    }
}
