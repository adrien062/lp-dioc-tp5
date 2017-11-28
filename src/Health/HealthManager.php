<?php
/**
 * Created by PhpStorm.
 * User: adrien.lambersens
 * Date: 28/11/17
 * Time: 10:59
 */

namespace App\Health;


use App\Entity\Player;
use App\Entity\PlayerPotion;
use App\Entity\Potion;
use PHPUnit\Framework\Exception;

class HealthManager
{

    private $healCalculator;

    public function __construct()
    {
        $this->healCalculator = new HealCalculator();
    }

    public function heal(Health $health){

        /** @var Player $player */
        $player = $health->player;
        $potion = $health->potion;
        $count = $health->count;

        /** @var PlayerPotion $playerPotion */
        $playerPotion = $this->getPlayerPotion($player);

        if($playerPotion->getCount() < $count){
            return;
        }

        for($i = 0; $i < count; $i++){
            $healPotion = $this->healCalculator->calculate($player->getHealthPoint(), $potion);

            if($healPotion === null){
                return;
            }

            $player->setHealthPoint($player->getHealthPoint() + $healPotion);
        }

    }

    private function getPlayerPotion(Player $player){
        foreach ($player->getPlayerPotions() as $pp){
            if($pp->getPotion){
                return $pp;
            }
        }
        throw new Exception("Pas la potion dispo");
    }

}