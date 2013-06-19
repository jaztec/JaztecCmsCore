<?php

namespace JaztecCmsCore\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="SectionArticleLinks")
 */
class SectionArticleLink extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    protected $sectionArticleLinkID;

    /**
     * @ORM\OneToOne(targetEntity="Section")
     * @ORM\JoinColumn(name="sectionID", referencedColumnName="sectionID")
     *
     * @var \JaztecCmsCore\Entity\Section
     */
    protected $section;

    /**
     * @ORM\OneToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="articleID", referencedColumnName="articleID")
     *
     * @var \JaztecCmsCore\Entity\Article
     */
    protected $article;

    /**
     * @return array
     */
    public function toArray() {
        return array();
    }
}
