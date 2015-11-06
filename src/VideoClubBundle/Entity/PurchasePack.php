<?php

namespace VideoClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchasePack
 *
 * @ORM\Table(name="purchasepacks")
 * @ORM\Entity(repositoryClass="VideoClubBundle\Entity\PurchasePackRepository")
 */
class PurchasePack
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="totalcost", type="decimal")
     */
    private $totalcost;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return PurchasePack
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return PurchasePack
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set totalcost
     *
     * @param string $totalcost
     *
     * @return PurchasePack
     */
    public function setTotalcost($totalcost)
    {
        $this->totalcost = $totalcost;

        return $this;
    }

    /**
     * Get totalcost
     *
     * @return string
     */
    public function getTotalcost()
    {
        return $this->totalcost;
    }
}

