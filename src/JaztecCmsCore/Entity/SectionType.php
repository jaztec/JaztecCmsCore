<?php

namespace JaztecCmsCore\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="SectionTypes")
 */
class SectionType extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    protected $sectionTypeID;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $description;

    /**
     * @return int
     */
    public function getSectionTypeID()
    {
        return $this->sectionTypeID;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param type $description
     * @return \JaztecCmsCore\Entity\SectionType
     */
    public function setDescription($description)
    {
        $this->description = (string) $description;

        return $this;
    }

    public function toArray()
    {
        return array(
            'SectionTypeID' => $this->getSectionTypeID(),
            'Description'   => $this->getDescription(),
        );
    }
}
