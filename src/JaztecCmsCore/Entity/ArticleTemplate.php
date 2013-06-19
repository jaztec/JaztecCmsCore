<?php

namespace JaztecCmsCore\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ArticleTemplates")
 */
class ArticleTemplate extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    protected $articleTemplateID;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $description;

    /**
     * @return int
     */
    public function getArticleTemplateID()
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
     * @param string $description
     * @return \JaztecCmsCore\Entity\ArticleTemplate
     */
    public function setDescription($description)
    {
        $this->description = (string) $description;

        return $this;
    }

    public function toArray()
    {
        return array(
            'ArticleTemplateID' => $this->getArticleTemplateID(),
            'Description'       => $this->getDescription(),
        );
    }
}
