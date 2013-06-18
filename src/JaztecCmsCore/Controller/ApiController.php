<?php

namespace JaztecCmsCore\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use JaztecCmsCore\Entity\Page;

/**
 * Application entry point.
 */
class ApiController extends AbstractActionController
{
    public function indexAction() {
        return new JsonModel(array(
            'success'   => false,
        ));
    }

    /**
     * Retrieves pages for the AngularJS front-end.
     * 
     * @throws \Exception
     */
    public function pageAction()
    {
        if (!$url = $this->params()->fromRoute('url')) {
            throw new \Exception('No valid URL received');
        }
        /** @var $pm \JaztecCmsCore\Mapper\PageMapper */
        $pm = $this->getServiceLocator()->get('jazteccmscore_pagemapper');
        /** $var $page \JaztecCmsCore\Entity\Page */
        $page = $pm->getByUrl($url);

        if ($page instanceof Page) {
            /** @var $pm \JaztecCmsCore\Mapper\SectionMapper */
            $sm = $this->getServiceLocator()->get('jazteccmscore_sectionmapper');
            /** @var array $pageArray */
            $pageArray = $page->toArray();
            // Add the sections owned by this page.
            $pageArray['sections'] = $sm->getByPage($page, \JaztecBase\Mapper\AbstractDoctrineMapper::TYPE_SERIALIZEDARRAY);
            return new JsonModel($pageArray);
        } else {
            return new JsonModel(array(
                'success' => false
            ));
        }
    }
}