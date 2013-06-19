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
        $dql = 'SELECT a FROM JaztecCmsCore\Entity\SectionArticleLink sal ' .
               'JOIN JaztecCmsCore\Entity\Article a '.
               'WHERE sal.section = ?1';
        /** $query Doctrine\ORM\Query */
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter(1, $section);
        /** @var $articles array */
        $articles = $query->getResult();

        return $this->processResult($articles, $resultType);
    }

}