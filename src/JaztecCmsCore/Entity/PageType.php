<?php

namespace JaztecCmsCore\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="PageTypes")
 */
class PageType extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    protected $pageTypeID;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $description;

    /**
     * @return int
     */
    public function getPageTypeID()
    {
        return $this->pageTypeID;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string                         $description
     * @return \JaztecCmsCore\Entity\PageType
     */
    public function setDescription($description)
    {
        $this->description = (string) $description;

        return $this;
    }

    public function toArray()
    {
        return array(
            'PageTypeID'    => $this->getPageTypeID(),
            'Description'   => $this->getDescription(),
        );
    }
}
