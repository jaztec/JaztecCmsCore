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

    /**
     * @ORM\OneToOne(targetEntity="Section")
     * @ORM\JoinColumn(name="sectionID", referencedColumnName="sectionID")
     *
     * @var \JaztecCmsCore\Entity\Section
     */
    protected $section;

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
    protected $content;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $url;

    /**
     * @return int
     */
    public function getArticleID() {
        return $this->articleID;
    }

    /**
     * @return type
     */
    public function getSection() {
        return $this->section;
    }

    /**
     * @param \JaztecCmsCore\Entity\Section $section
     * @return \JaztecCmsCore\Entity\Article
     */
    public function setSection(Section $section) {
        $this->section = $section;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     * @return \JaztecCmsCore\Entity\Article
     */
    public function setTitle($title) {
        $this->title = (string) $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     * @return \JaztecCmsCore\Entity\Article
     */
    public function setDescription($description) {
        $this->description = (string) $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @param string $content
     * @return \JaztecCmsCore\Entity\Article
     */
    public function setContent($content) {
        $this->content = (string) $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $url
     * @return \JaztecCmsCore\Entity\Article
     */
    public function setUrl($url) {
        $this->url = (string) $url;
        return $this;
    }

    public function serialize() {
        return array(
            'ArticleID'         => $this->getArticleID(),
            'SectionID'         => $this->getSection()->getSectionID(),
            'Title'             => $this->getTitle(),
            'Description'       => $this->getDescription(),
            'Content'           => $this->getContent(),
            'Url'               => $this->getUrl(),
        );
    }
}