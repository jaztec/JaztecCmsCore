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
            return new JsonModel($page->toArray());
        } else {
            return new JsonModel(array(
                'success' => false
            ));
        }
    }
}