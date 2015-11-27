<?php

namespace VideoClubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * PackageMin
 *
 * @ORM\Table(name="packagemins")
 * @ORM\Entity(repositoryClass="VideoClubBundle\Entity\PackageMinRepository")
 */
class PackageMin
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
     * @var string
     *
     * @ORM\Column(name="packname", type="string", length=50)
     */
    private $packname;

    /**
     * @var integer
     *
     * @ORM\Column(name="minutes", type="integer")
     */
    private $minutes;

    /**
     * @var string
     *
     * @ORM\Column(name="cost", type="decimal")
     */
    private $cost;

    /**
     * @ORM\OneToMany(targetEntity="PurchasePack", mappedBy="packagemin")
     */
    private $purchases;


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
     * Set packname
     *
     * @param string $packname
     *
     * @return PackageMin
     */
    public function setPackname($packname)
    {
        $this->packname = $packname;

        return $this;
    }

    /**
     * Get packname
     *
     * @return string
     */
    public function getPackname()
    {
        return $this->packname;
    }

    /**
     * Set minutes
     *
     * @param integer $minutes
     *
     * @return PackageMin
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;

        return $this;
    }

    /**
     * Get minutes
     *
     * @return integer
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * Set cost
     *
     * @param string $cost
     *
     * @return PackageMin
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->purchases = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add purchase
     *
     * @param \VideoClubBundle\Entity\PurchasePack $purchase
     *
     * @return PackageMin
     */
    public function addPurchase(\VideoClubBundle\Entity\PurchasePack $purchase)
    {
        $this->purchases[] = $purchase;

        return $this;
    }

    /**
     * Remove purchase
     *
     * @param \VideoClubBundle\Entity\PurchasePack $purchase
     */
    public function removePurchase(\VideoClubBundle\Entity\PurchasePack $purchase)
    {
        $this->purchases->removeElement($purchase);
    }

    /**
     * Get purchases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPurchases()
    {
        return $this->purchases;
    }
}
