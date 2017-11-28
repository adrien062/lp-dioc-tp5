<?php
/**
 * Created by PhpStorm.
 * User: adrien.lambersens
 * Date: 28/11/17
 * Time: 11:12
 */

namespace App\Health;


use App\Entity\Player;
use App\Entity\Potion;

class HealCalculator
{
    public function calculate($healPoint, Potion $potion){
        if($healPoint > $potion->getLimitHealth()){
            return null;
        }

        $newHealth = $healPoint + $potion->getHealhPoint();

        if($newHealth > $potion->getLimitHealth()){
            return $potion->getLimitHealth() - $healPoint;
        }

        return $potion->getHealhPoint();
    }
}
