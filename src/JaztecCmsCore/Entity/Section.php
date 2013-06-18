<?php

namespace JaztecCmsCore\Entity;

use Doctrine\ORM\Mapping as ORM;

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

    /**
     * @ORM\OneToOne(targetEntity="Page")
     * @ORM\JoinColumn(name="pageID", referencedColumnName="pageID")
     *
     * @var \JaztecCmsCore\Entity\Page
     */
    protected $page;

    /**
     * @ORM\OneToOne(targetEntity="SectionType")
     * @ORM\JoinColumn(name="sectionTypeID", referencedColumnName="sectionTypeID")
     *
     * @var \JaztecCmsCore\Entity\SectionType
     */
    protected $sectionType;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $text;

    /**
     * @return int
     */
    public function getSectionID()
    {
        return $this->sectionID;
    }

    /**
     * @return \JaztecCmsCore\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param  \JaztecCmsCore\Entity\Page    $page
     * @return \JaztecCmsCore\Entity\Section
     */
    public function setPage(\JaztecCmsCore\Entity\Page $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return \JaztecCmsCore\Entity\SectionType
     */
    public function getSectionType() {
        return $this->sectionType;
    }

    /**
     * @param \JaztecCmsCore\Entity\SectionType $sectionType
     * @return \JaztecCmsCore\Entity\Section
     */
    public function setSectionType(SectionType $sectionType) {
        $this->sectionType = $sectionType;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param  string                        $text
     * @return \JaztecCmsCore\Entity\Section
     */
    public function setText($text)
    {
        $this->text = (string) $text;

        return $this;
    }

    public function toArray()
    {
        return array(
            'SectionID'             => $this->getSectionID(),
            'PageID'                => $this->getPage()->getPageID(),
            'PageTitle'             => $this->getPage()->getTitle(),
            'SectionTypeID'         => $this->getSectionType()->getSectionTypeID(),
            'SectionDescription'    => $this->getSectionType()->getDescription(),
            'Text'                  => $this->getText(),
        );
    }
}
