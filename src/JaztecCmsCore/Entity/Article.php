<?php

namespace JaztecCmsCore\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="Articles")
 */
class Article extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    protected $articleID;

    public function serialize() {
        return array();
    }
}