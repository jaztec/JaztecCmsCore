<?php

namespace JaztecCmsCore\Mapper;

use JaztecBase\Mapper\AbstractDoctrineMapper;

class PageMapper extends AbstractDoctrineMapper
{
    /**
     * Return a page entity by its url.
     * 
     * @param string $url
     * @return \JaztecCmsCore\Entity\Page
     * @throws \Exception
     */
    public function getByUrl($url)
    {
        if (!is_string($url)) {
            throw new \Exception('PageMapper::getByUrl expects a string parameter, ' . get_class($url) . ' received.');
        }
        /** @var $page \JaztecCmsCore\Entity\Page */
        $page = $this->getEntityManager()->getRepository('JaztecCmsCore\Entity\Page')->findBy(array('url' => $url));

        return $page;
    }
}