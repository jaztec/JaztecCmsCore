<?php

namespace JaztecCmsCore\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Application entry point.
 */
class IndexController extends AbstractActionController
{
    public function indexAction() {
        $this->layout('jaztec_cms_core/layout');

        return new ViewModel();
    }
}