<?php

namespace JaztecCmsCore\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="Pages")
 */
class Page extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var int
     */
    protected $pageID;

    /**
     * @ORM\OneToOne(targetEntity="PageType")
     * @ORM\JoinColumn(name="pageTypeID", referencedColumnName="pageTypeID")
     *
     * @var \JaztecCmsCore\Entity\PageType
     */
    protected $pageType;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $url;

    /**
     * @return int
     */
    public function getPageID()
    {
        return $this->pageID;
    }

    /**
     * @return \JaztecCmsCore\Entity\PageType
     */
    public function getPageType()
    {
        return $this->pageType;
    }

    /**
     * @param  \JaztecCmsCore\Entity\PageType $pageType
     * @return \JaztecCmsCore\Entity\Page
     */
    public function setPageType(\JaztecCmsCore\Entity\PageType $pageType)
    {
        $this->pageType = (int) $pageType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param  string                     $title
     * @return \JaztecCmsCore\Entity\Page
     */
    public function setTitle($title)
    {
        $this->title = (string) $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param  string                     $description
     * @return \JaztecCmsCore\Entity\Page
     */
    public function setDescription($description)
    {
        $this->description = (string) $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param  string                     $url
     * @return \JaztecCmsCore\Entity\Page
     */
    public function setUrl($url)
    {
        $this->url = (string) $url;

        return $this;
    }

    public function toArray()
    {
        return array(
            'PageID'                => $this->getPageID(),
            'Title'                 => $this->getTitle(),
            'Description'           => $this->getDescription(),
            'Url'                   => $this->getUrl(),
            'PageTypeID'            => $this->getPageType()->getPageTypeID(),
            'PageTypeDescription'   => $this->getPageType()->getDescription(),
        );
    }
}
