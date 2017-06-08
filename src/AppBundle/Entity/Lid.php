<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lid
 *
 * @ORM\Table(name="lid")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LidRepository")
 */
class Lid
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
     * @var string
     *
     * @ORM\Column(name="voornaam", type="string", length=255)
     */
    private $voornaam;

    /**
     * @var string
     *
     * @ORM\Column(name="achternaam", type="string", length=255)
     */
    private $achternaam;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="geboortedatum", type="date", nullable=true)
     */
    private $geboortedatum;

    /**
     * @var string
     *
     * @ORM\Column(name="geslacht", type="string", length=255, nullable=true)
     */
    private $geslacht;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="tel2", type="string", length=255, nullable=true)
     */
    private $tel2;

    /**
     * @var string
     *
     * @ORM\Column(name="straatnaam", type="string", length=255, nullable=true)
     */
    private $straatnaam;

    /**
     * @var string
     *
     * @ORM\Column(name="huisnummer", type="string", length=255, nullable=true)
     */
    private $huisnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=25, nullable=true)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="wijk", type="string", length=255, nullable=true)
     */
    private $wijk;

    /**
     * @var string
     *
     * @ORM\Column(name="stad", type="string", length=255, nullable=true)
     */
    private $stad;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Strip", mappedBy="lid")
     */
    private $strippen;





    public function __construct() {
        $this->strippen = new ArrayCollection();
    }

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
     * Set voornaam
     *
     * @param string $voornaam
     *
     * @return Lid
     */
    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    /**
     * Get voornaam
     *
     * @return string
     */
    public function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * Set achternaam
     *
     * @param string $achternaam
     *
     * @return Lid
     */
    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    /**
     * Get voornaamAchternaam
     *
     * @return string
     */
    public function getVoornaamAchternaam()
    {
        return $this->voornaam.' '.$this->achternaam;
    }

    /**
     * Get achternaam
     *
     * @return string
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * Set geboortedatum
     *
     * @param string $geboortedatum
     *
     * @return Lid
     */
    public function setGeboortedatum($geboortedatum)
    {
        $this->geboortedatum = $geboortedatum;

        return $this;
    }

    /**
     * Get geboortedatum
     *
     * @return string
     */
    public function getGeboortedatum()
    {
        return $this->geboortedatum;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     *
     * @return Lid
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set geslacht
     *
     * @param string $geslacht
     *
     * @return Lid
     */
    public function setGeslacht($geslacht)
    {
        $this->geslacht = $geslacht;

        return $this;
    }

    /**
     * Get geslacht
     *
     * @return string
     */
    public function getGeslacht()
    {
        return $this->geslacht;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Lid
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Lid
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set tel2
     *
     * @param string $tel2
     *
     * @return Lid
     */
    public function setTel2($tel2)
    {
        $this->tel2 = $tel2;

        return $this;
    }

    /**
     * Get tel2
     *
     * @return string
     */
    public function getTel2()
    {
        return $this->tel2;
    }

    /**
     * Set straatnaam
     *
     * @param string $straatnaam
     *
     * @return Lid
     */
    public function setStraatnaam($straatnaam)
    {
        $this->straatnaam = $straatnaam;

        return $this;
    }

    /**
     * Get straatnaam
     *
     * @return string
     */
    public function getStraatnaam()
    {
        return $this->straatnaam;
    }

    /**
     * Set huisnummer
     *
     * @param string $huisnummer
     *
     * @return Lid
     */
    public function setHuisnummer($huisnummer)
    {
        $this->huisnummer = $huisnummer;

        return $this;
    }

    /**
     * Get huisnummer
     *
     * @return string
     */
    public function getHuisnummer()
    {
        return $this->huisnummer;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return Lid
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set wijk
     *
     * @param string $wijk
     *
     * @return Lid
     */
    public function setWijk($wijk)
    {
        $this->wijk = $wijk;

        return $this;
    }

    /**
     * Get wijk
     *
     * @return string
     */
    public function getWijk()
    {
        return $this->wijk;
    }

    /**
     * Set stad
     *
     * @param string $stad
     *
     * @return Lid
     */
    public function setStad($stad)
    {
        $this->stad = $stad;

        return $this;
    }

    /**
     * Get stad
     *
     * @return string
     */
    public function getStad()
    {
        return $this->stad;
    }

    /**
     * Add strippen
     *
     * @param \AppBundle\Entity\Strip $strippen
     *
     * @return Lid
     */
    public function addStrippen(\AppBundle\Entity\Strip $strippen)
    {
        $this->strippen[] = $strippen;

        return $this;
    }

    /**
     * Remove strippen
     *
     * @param \AppBundle\Entity\Strip $strippen
     */
    public function removeStrippen(\AppBundle\Entity\Strip $strippen)
    {
        $this->strippen->removeElement($strippen);
    }

    /**
     * Get strippen
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStrippen()
    {
        return $this->strippen;
    }

    public function __toString()
    {
        return $this->getVoornaam();
    }
}
