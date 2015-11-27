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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="purchases")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="PackageMin", inversedBy="purchases")
     * @ORM\JoinColumn(name="packagemin_id", referencedColumnName="id")
     */
    private $packagemin;


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

    /**
     * Set packageminId
     *
     * @param integer $packageminId
     *
     * @return PurchasePack
     */
    public function setPackageminId($packageminId)
    {
        $this->packagemin_id = $packageminId;

        return $this;
    }

    /**
     * Get packageminId
     *
     * @return integer
     */
    public function getPackageminId()
    {
        return $this->packagemin_id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return PurchasePack
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set user
     *
     * @param \VideoClubBundle\Entity\User $user
     *
     * @return PurchasePack
     */
    public function setUser(\VideoClubBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \VideoClubBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set packagemin
     *
     * @param \VideoClubBundle\Entity\PackageMin $packagemin
     *
     * @return PurchasePack
     */
    public function setPackagemin(\VideoClubBundle\Entity\PackageMin $packagemin = null)
    {
        $this->packagemin = $packagemin;

        return $this;
    }

    /**
     * Get packagemin
     *
     * @return \VideoClubBundle\Entity\PackageMin
     */
    public function getPackagemin()
    {
        return $this->packagemin;
    }
}
