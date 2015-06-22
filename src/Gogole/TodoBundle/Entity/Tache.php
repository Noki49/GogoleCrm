<?php

namespace Gogole\TodoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tache
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gogole\TodoBundle\Entity\TacheRepository")
 */
class Tache
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
     * @ORM\Column(name="tache", type="string", length=600)
     */
    private $tache;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEcheance", type="date",nullable=true)
     */
    private $dateEcheance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFait", type="datetime",nullable=true)
     */
    private $dateFait;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean",nullable=true)
     *
     */
    private $etat;

    /**
    * @var User
    *
    *@ORM\ManyToOne(targetEntity="Gogole\UserBundle\Entity\User")
    */
    private $utilisateur;

    // fonction crée donne la date du jour a la creation de la tache 
    public function __construct($utilisateur){

        $this->dateCreation = new \dateTime;
        $this->etat = false;
        $this->utilisateur = $utilisateur;
        
    }

    public function __toString(){

        return $this->tache;
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
     * Set tache
     *
     * @param string $tache
     * @return Tache
     */
    public function setTache($tache)
    {
        $this->tache = $tache;

        return $this;
    }

    /**
     * Get tache
     *
     * @return string 
     */
    public function getTache()
    {
        return $this->tache;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Tache
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateEcheance
     *
     * @param \DateTime $dateEcheance
     * @return Tache
     */
    public function setDateEcheance($dateEcheance)
    {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

    /**
     * Get dateEcheance
     *
     * @return \DateTime 
     */
    public function getDateEcheance()
    {
        return $this->dateEcheance;
    }

    /**
     * Set dateFait
     *
     * @param \DateTime $dateFait
     * @return Tache
     */
    public function setDateFait($dateFait)
    {
        $this->dateFait = $dateFait;

        return $this;
    }

    /**
     * Get dateFait
     *
     * @return \DateTime 
     */
    public function getDateFait()
    {
        return $this->dateFait;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     * @return Tache
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Get utilisateur
     *
     * @return Gogole\UserBundle\Entity\User
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }



}
