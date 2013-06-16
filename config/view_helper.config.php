<?php

namespace JaztecCmsCore;

use Zend\ServiceManager\AbstractPluginManager;

use JaztecCmsCore\View\Helper\AngularJsApp;
use JaztecCmsCore\View\Helper\Cms;

return array(
    'factories' => array(
        'angularJsApp' => function(AbstractPluginManager $pm) {
            /**
             * @var $config array
             */
            $config = $pm->getServiceLocator()->get('Config');
            /**
             * @var $headLink \Zend\View\Helper\HeadLink
             */
            $headLink = $pm->get('HeadLink');
            /**
             * @var $headScript \Zend\View\Helper\HeadScript
             */
            $headScript = $pm->get('HeadScript');

            return new AngularJsApp($config, $headLink, $headScript);
        },
        'cms' => function(AbstractPluginManager $pm) {
            /**
             * @var $config array
             */
            $config = $pm->getServiceLocator()->get('Config');
            /**
             * @var $headTitle \Zend\View\Helper\HeadTitle
             */
            $headTitle = $pm->get('HeadTitle');

            return new Cms($config, $headTitle);
        }
    ),
);
