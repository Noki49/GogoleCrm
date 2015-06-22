<?php

namespace Gogole\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorieContact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gogole\ContactBundle\Entity\categorieContactRepository")
 */
class categorieContact
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
     * @ORM\Column(name="typeContact", type="string", length=255)
     */
    private $typeContact;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString(){
	return $this->typeContact;
    }

    /**
     * Set typeContact
     *
     * @param string $typeContact
     * @return categorieContact
     */
    public function setTypeContact($typeContact)
    {
        $this->typeContact = $typeContact;

        return $this;
    }

    /**
     * Get typeContact
     *
     * @return string 
     */
    public function getTypeContact()
    {
        return $this->typeContact;
    }
}
