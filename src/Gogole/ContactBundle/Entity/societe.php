<?php

namespace Gogole\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * societe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gogole\ContactBundle\Entity\societeRepository")
 */
class societe
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
     * @ORM\Column(name="nomSociete", type="string", length=255)
     */
    private $nomSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="siretSociete", type="string", length=255, nullable=true)
     */
    private $siretSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="eMailSociete", type="string", length=255, nullable=true)
     */
    private $eMailSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="telSociete", type="string", length=255, nullable=true)
     */
    private $telSociete;


    public function __toString(){
	return $this->nomSociete;
    }

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
     * Set nomSociete
     *
     * @param string $nomSociete
     * @return societe
     */
    public function setNomSociete($nomSociete)
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    /**
     * Get nomSociete
     *
     * @return string 
     */
    public function getNomSociete()
    {
        return $this->nomSociete;
    }

    /**
     * Set siretSociete
     *
     * @param string $siretSociete
     * @return societe
     */
    public function setSiretSociete($siretSociete)
    {
        $this->siretSociete = $siretSociete;

        return $this;
    }

    /**
     * Get siretSociete
     *
     * @return string 
     */
    public function getSiretSociete()
    {
        return $this->siretSociete;
    }

    /**
     * Set eMailSociete
     *
     * @param string $eMailSociete
     * @return societe
     */
    public function setEMailSociete($eMailSociete)
    {
        $this->eMailSociete = $eMailSociete;

        return $this;
    }

    /**
     * Get eMailSociete
     *
     * @return string 
     */
    public function getEMailSociete()
    {
        return $this->eMailSociete;
    }

    /**
     * Set telSociete
     *
     * @param string $telSociete
     * @return societe
     */
    public function setTelSociete($telSociete)
    {
        $this->telSociete = $telSociete;

        return $this;
    }

    /**
     * Get telSociete
     *
     * @return string 
     */
    public function getTelSociete()
    {
        return $this->telSociete;
    }
}
