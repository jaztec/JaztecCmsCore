<?php

namespace JaztecCmsCore\Mapper;

use JaztecBase\Mapper\AbstractDoctrineMapper;

use JaztecCmsCore\Entity\Page;

class PageMapper extends AbstractDoctrineMapper
{
    /**
     * Return a page entity by its url.
     * 
     * @param string $url
     * @return \JaztecCmsCore\Entity\Page|boolean
     * @throws \Exception
     */
    public function getByUrl($url)
    {
        if (!is_string($url)) {
            throw new \Exception('PageMapper->getByUrl() expects a string parameter, ' . get_class($url) . ' received.');
        }
        /** @var $pages array */
        $pages = $this->getEntityManager()->getRepository('JaztecCmsCore\Entity\Page')->findBy(array('url' => $url));
        /** @var $page \JaztecCmsCore\Entity\Page */
        $page = $pages[0];

        return $page;
    }

}