<?php

namespace JaztecCmsCore\Mapper;

use JaztecBase\Mapper\AbstractDoctrineMapper;

use JaztecCmsCore\Entity\Page;
use JaztecCmsCore\Entity\Section;
use JaztecCmsCore\Entity\Article;

class ArticleMapper extends AbstractDoctrineMapper
{
    /**
     * Get the articles belonging to a section.
     * 
     * @param \JaztecCmsCore\Entity\Section $section
     * @param integer $resultType
     * @return array
     */
    public function getBySection(Section $section, $resultType = AbstractDoctrineMapper::TYPE_ENTITYARRAY)
    {
        /** @var $articles array */
        $articles = $this->getEntityManager()->getRepository('JaztecCmsCore\Entity\Article')->findBy(array('section' => $section));

        return $this->processResult($articles, $resultType);
    }

}