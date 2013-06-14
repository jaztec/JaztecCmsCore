<?php

namespace JaztecCmsCore\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="Sections")
 */
class Section extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    protected $sectionID;

    public function serialize() {
        return array();
    }
}