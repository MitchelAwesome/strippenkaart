<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Strip
 *
 * @ORM\Table(name="strip")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StripRepository")
 */
class Strip
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="purchased_at", type="date")
     */
    private $purchasedAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="used", type="boolean", nullable=true)
     */
    private $used;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="used_at", type="date", nullable=true)
     */
    private $usedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255, nullable=true)
     */
    private $price;


    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Lid", inversedBy="strippen")
     * @ORM\JoinColumn(name="lid_id", referencedColumnName="id")
     */
    private $lid;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set purchasedAt
     *
     * @param \DateTime $purchasedAt
     *
     * @return Strip
     */
    public function setPurchasedAt($purchasedAt)
    {
        $this->purchasedAt = $purchasedAt;

        return $this;
    }

    /**
     * Get purchasedAt
     *
     * @return \DateTime
     */
    public function getPurchasedAt()
    {
        return $this->purchasedAt;
    }

    /**
     * Set used
     *
     * @param boolean $used
     *
     * @return Strip
     */
    public function setUsed($used)
    {
        $this->used = $used;

        return $this;
    }

    /**
     * Get used
     *
     * @return bool
     */
    public function getUsed()
    {
        return $this->used;
    }

    /**
     * Set usedAt
     *
     * @param \DateTime $usedAt
     *
     * @return Strip
     */
    public function setUsedAt($usedAt)
    {
        $this->usedAt = $usedAt;

        return $this;
    }

    /**
     * Get usedAt
     *
     * @return \DateTime
     */
    public function getUsedAt()
    {
        return $this->usedAt;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Strip
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set lid
     *
     * @param \AppBundle\Entity\Lid $lid
     *
     * @return Strip
     */
    public function setLid(\AppBundle\Entity\Lid $lid = null)
    {
        $this->lid = $lid;

        return $this;
    }

    /**
     * Get lid
     *
     * @return \AppBundle\Entity\Lid
     */
    public function getLid()
    {
        return $this->lid;
    }


}
