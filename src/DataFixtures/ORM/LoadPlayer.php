<?php

namespace App\DataFixtures\ORM;

use App\Entity\Player;
use App\Entity\PlayerPotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadPlayer extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $players = [
            $faker->name => 'shotgun',
            $faker->name => 'shotgun',
            $faker->name => 'sniper',
            $faker->name => 'm4',
            $faker->name => 'm4',
            $faker->name => 'm4',
            $faker->name => 'handgun',
            $faker->name => 'handgun',
        ];

        $potions = ['small', 'medium', 'large', 'ultra'];

        foreach ($players as $name => $weapon) {

            $player = new Player();
            $player->setName($name);
            $player->setCurrentWeapon($this->getReference($weapon));

            for($i = 0; $i < count($potions); $i++){
                $playerPotion = new PlayerPotion();
                $playerPotion->setCount(rand(0,5));

                $playerPotion->setPotion($this->getReference($potions[$i]));
                $player->addPlayerPotions($playerPotion);
            }
            $manager->persist($player);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [LoadWeapon::class, LoadPotion::class];
    }
}
