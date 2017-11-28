<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Potion
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column()
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $limitHealth;

    /**
     * @ORM\Column(type="integer")
     */
    private $healhPoint;

    /**
     * Potion constructor.
     * @param $name
     * @param $limit
     * @param $healhPoint
     */
    public function __construct($name, $limit, $healhPoint)
    {
        $this->name = $name;
        $this->limitHealth = $limit;
        $this->healhPoint = $healhPoint;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLimitHealth()
    {
        return $this->limitHealth;
    }

    /**
     * @param mixed $limit
     */
    public function setLimitHealth($limit)
    {
        $this->limitHealth = $limit;
    }

    /**
     * @return mixed
     */
    public function getHealhPoint()
    {
        return $this->healhPoint;
    }

    /**
     * @param mixed $healhPoint
     */
    public function setHealhPoint($healhPoint)
    {
        $this->healhPoint = $healhPoint;
    }


}
