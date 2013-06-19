<?php

namespace JaztecCmsCore\Mapper;

use JaztecBase\Mapper\AbstractDoctrineMapper;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

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
        $sql = 'SELECT a.articleID, a.articleTemplateID, a.title, a.description, ' .
               'a.content, a.url FROM SectionArticleLinks sal ' .
               'LEFT JOIN Articles a ON sal.articleID = a.articleID ' .
               'LEFT JOIN Sections s ON sal.sectionID = s.sectionID ' .
               'WHERE s.sectionID = :sectionID';
        /** $rsm \Doctrine\ORM\Query\ResultSetMappingBuilder */
        $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addRootEntityFromClassMetadata('JaztecCmsCore\Entity\Article', 'a');
        /** $query Doctrine\ORM\NativeQuery */
        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);
        $query->setParameter(':sectionID', $section->getSectionID());
        /** @var $articles array */
        $articles = $query->getResult();

        return $this->processResult($articles, $resultType);
    }

}