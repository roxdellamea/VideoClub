<?php

namespace VideoClubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="VideoClubBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50)
     */
    private $lastname;

    /**
     * @var integer
     *
     * @ORM\Column(name="freemin", type="integer")
     * @Assert\IsNull()
     */
    private $freemin;

    /**
     * @ORM\OneToMany(targetEntity="PurchasePack", mappedBy="user")
     */
    private $purchases;

    /**
     * @ORM\OneToMany(targetEntity="Rental", mappedBy="user")
     */
    private $rentals;

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set freemin
     *
     * @param integer $freemin
     *
     * @return User
     */
    public function setFreemin($freemin)
    {
        $this->freemin = $freemin;

        return $this;
    }

    /**
     * Get freemin
     *
     * @return integer
     */
    public function getFreemin()
    {
        return $this->freemin;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->rentals = new \Doctrine\Common\Collections\ArrayCollection();
        $this->purchases = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add purchase
     *
     * @param \VideoClubBundle\Entity\PurchasePack $purchase
     *
     * @return User
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

    /**
     * Add rental
     *
     * @param \VideoClubBundle\Entity\Rental $rental
     *
     * @return User
     */
    public function addRental(\VideoClubBundle\Entity\Rental $rental)
    {
        $this->rentals[] = $rental;

        return $this;
    }

    /**
     * Remove rental
     *
     * @param \VideoClubBundle\Entity\Rental $rental
     */
    public function removeRental(\VideoClubBundle\Entity\Rental $rental)
    {
        $this->rentals->removeElement($rental);
    }

    /**
     * Get rentals
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRentals()
    {
        return $this->rentals;
    }
}
