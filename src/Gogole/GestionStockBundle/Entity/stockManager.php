<?php

namespace Gogole\GestionStockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * stockManager
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gogole\GestionStockBundle\Entity\stockManagerRepository")
 */
class stockManager
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
     * @ORM\Column(name="ref", type="string", length=255)
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="pa", type="float")
     */
    private $pa;

    /**
     * @var float
     *
     * @ORM\Column(name="pv", type="float")
     */
    private $pv;

    /**
     * @var float
     *
     * @ORM\Column(name="marge", type="float")
     */
    private $marge;

    /**
     * @var integer
     *
     * @ORM\Column(name="qttStock", type="integer")
     */
    private $qttStock;

    /**
     * @var integer
     *
     * @ORM\Column(name="qttSeuil", type="integer")
     */
    private $qttSeuil;


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
     * Set ref
     *
     * @param string $ref
     * @return stockManager
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return stockManager
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set pa
     *
     * @param float $pa
     * @return stockManager
     */
    public function setPa($pa)
    {
        $this->pa = $pa;

        return $this;
    }

    /**
     * Get pa
     *
     * @return float 
     */
    public function getPa()
    {
        return $this->pa;
    }

    /**
     * Set pv
     *
     * @param float $pv
     * @return stockManager
     */
    public function setPv($pv)
    {
        $this->pv = $pv;

        return $this;
    }

    /**
     * Get pv
     *
     * @return float 
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Set marge
     *
     * @param float $marge
     * @return stockManager
     */
    public function setMarge($marge)
    {
        $this->marge = $marge;

        return $this;
    }

    /**
     * Get marge
     *
     * @return float 
     */
    public function getMarge()
    {
        return $this->marge;
    }

    /**
     * Set qttStock
     *
     * @param integer $qttStock
     * @return stockManager
     */
    public function setQttStock($qttStock)
    {
        $this->qttStock = $qttStock;

        return $this;
    }

    /**
     * Get qttStock
     *
     * @return integer 
     */
    public function getQttStock()
    {
        return $this->qttStock;
    }

    /**
     * Set qttSeuil
     *
     * @param integer $qttSeuil
     * @return stockManager
     */
    public function setQttSeuil($qttSeuil)
    {
        $this->qttSeuil = $qttSeuil;

        return $this;
    }

    /**
     * Get qttSeuil
     *
     * @return integer 
     */
    public function getQttSeuil()
    {
        return $this->qttSeuil;
    }
}
