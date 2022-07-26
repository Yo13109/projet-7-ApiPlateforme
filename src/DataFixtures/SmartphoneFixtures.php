<?php

namespace App\DataFixtures;

use App\Entity\Smartphone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SmartphoneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $datas = [
            1 => [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
            2 => [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
            3 => [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
            4 =>  [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
            5 =>  [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
            6 =>  [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
            7 => [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
            8 => [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
            9 => [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
            10 => [
                'name' => 'Samsung S20',
                'brand' => 'samsung',
                'price' => 150.00,
                'image'=> 'toto.jpg',
            ],
        ];

        foreach ($datas as $key => $smartphoneData) {
            $smartphone = new Smartphone();
            $smartphone
                ->setName($smartphoneData['name'])
                ->setBrand($smartphoneData['brand'])
                ->setImage($smartphoneData['image'])
                ->setPrice($smartphoneData['price']);
                
            $manager->persist($smartphone);
        }

        $manager->flush();
    }
}