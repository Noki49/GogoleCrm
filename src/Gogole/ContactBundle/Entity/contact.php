<?php

namespace Gogole\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * contact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gogole\ContactBundle\Entity\contactRepository")
 */
class contact
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
     * @ORM\Column(name="nomContact", type="string", length=255)
     */
    private $nomContact;

    /**
     *@var string
     *
     *@ORM\ManyToOne(targetEntity="Gogole\ContactBundle\Entity\societe")
     */
    private $societe;

    /**
     *@var string
     *
     *@ORM\ManyToOne(targetEntity="Gogole\ContactBundle\Entity\categorieContact")
     */
    private $categorieContact;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomContact", type="string", length=255)
     */
    private $prenomContact;

    /**
     * @var string
     *
     * @ORM\Column(name="eMailContact", type="string", length=255, nullable=true)
     */
    private $eMailContact;

    /**
     * @var string
     *
     * @ORM\Column(name="telContact", type="string", length=255, nullable=true)
     */
    private $telContact;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireContact", type="string", length=255, nullable=true)
     */
    private $commentaireContact;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeNaissanceContact", type="date", nullable=true)
     */
    private $dateDeNaissanceContact;


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
     * Set nomContact
     *
     * @param string $nomContact
     * @return contact
     */
    public function setNomContact($nomContact)
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    /**
     * Get nomContact
     *
     * @return string 
     */
    public function getNomContact()
    {
        return $this->nomContact;
    }

    /**
     * Set prenomContact
     *
     * @param string $prenomContact
     * @return contact
     */
    public function setPrenomContact($prenomContact)
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    /**
     * Get prenomContact
     *
     * @return string 
     */
    public function getPrenomContact()
    {
        return $this->prenomContact;
    }

    /**
     * Set eMailContact
     *
     * @param string $eMailContact
     * @return contact
     */
    public function setEMailContact($eMailContact)
    {
        $this->eMailContact = $eMailContact;

        return $this;
    }

    /**
     * Get eMailContact
     *
     * @return string 
     */
    public function getEMailContact()
    {
        return $this->eMailContact;
    }

    /**
     * Set telContact
     *
     * @param string $telContact
     * @return contact
     */
    public function setTelContact($telContact)
    {
        $this->telContact = $telContact;

        return $this;
    }

    /**
     * Get telContact
     *
     * @return string 
     */
    public function getTelContact()
    {
        return $this->telContact;
    }

    /**
     * Set commentaireContact
     *
     * @param string $commentaireContact
     * @return contact
     */
    public function setCommentaireContact($commentaireContact)
    {
        $this->commentaireContact = $commentaireContact;

        return $this;
    }

    /**
     * Get commentaireContact
     *
     * @return string 
     */
    public function getCommentaireContact()
    {
        return $this->commentaireContact;
    }

    /**
     * Set dateDeNaissanceContact
     *
     * @param \DateTime $dateDeNaissanceContact
     * @return contact
     */
    public function setDateDeNaissanceContact($dateDeNaissanceContact)
    {
        $this->dateDeNaissanceContact = $dateDeNaissanceContact;

        return $this;
    }

    /**
     * Get dateDeNaissanceContact
     *
     * @return \DateTime 
     */
    public function getDateDeNaissanceContact()
    {
        return $this->dateDeNaissanceContact;
    }

    /**
     * Set societe
     *
     * @param \Gogole\ContactBundle\Entity\societe $societe
     * @return contact
     */
    public function setSociete(\Gogole\ContactBundle\Entity\societe $societe = null)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return \Gogole\ContactBundle\Entity\societe 
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set categorieContact
     *
     * @param \Gogole\ContactBundle\Entity\categorieContact $categorieContact
     * @return contact
     */
    public function setCategorieContact(\Gogole\ContactBundle\Entity\categorieContact $categorieContact = null)
    {
        $this->categorieContact = $categorieContact;

        return $this;
    }

    /**
     * Get categorieContact
     *
     * @return \Gogole\ContactBundle\Entity\categoriContact 
     */
    public function getCategorieContact()
    {
        return $this->categorieContact;
    }
}
