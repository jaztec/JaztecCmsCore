<?php

namespace JaztecCmsCore\Mapper;

use JaztecBase\Mapper\AbstractDoctrineMapper;

use JaztecCmsCore\Entity\Page;
use JaztecCmsCore\Entity\Section;

class SectionMapper extends AbstractDoctrineMapper
{
    /**
     * Get the sections inside a page.
     * 
     * @param \JaztecCmsCore\Entity\Page $page
     * @param integer $resultType
     * @return array
     */
    public function getByPage(Page $page, $resultType = AbstractDoctrineMapper::TYPE_ENTITYARRAY)
    {
        /** @var $pages array */
        $sections = $this->getEntityManager()->getRepository('JaztecCmsCore\Entity\Section')->findBy(array('page' => $page));

        return $this->processResult($sections, $resultType);
    }

}