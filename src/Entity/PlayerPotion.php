<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use phpDocumentor\Reflection\Types\Iterable_;

/**
 * @ORM\Entity
 */
class PlayerPotion
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $count;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="playerPotions")
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity="Potion")
     */
    private $potion;

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param mixed $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    /**
     * @return mixed
     */
    public function getPotion()
    {
        return $this->potion;
    }

    /**
     * @param mixed $potions
     */
    public function setPotion($potion)
    {
        $this->potion = $potion;
    }

}
