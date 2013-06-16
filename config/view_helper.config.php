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

            return new AngularJsApp($config['jaztec_cms_core'], $headLink, $headScript);
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
            /**
             * @var $headTitle \Zend\View\Helper\HeadTitle
             */
            $headLink = $pm->get('HeadLink');
            /**
             * @var $headTitle \Zend\View\Helper\HeadTitle
             */
            $headStyle = $pm->get('HeadStyle');
            /**
             * @var $headTitle \Zend\View\Helper\HeadTitle
             */
            $headScript = $pm->get('HeadScript');
            /**
             * @var $headTitle \Zend\View\Helper\HeadTitle
             */
            $headMeta = $pm->get('HeadMeta');
            /**
             * @var $basePath \Zend\View\Helper\BasePath
             */
            $basePath = $pm->get('BasePath');

            return new Cms($config['jaztec_cms_core'], $headTitle, $headLink, 
                $headStyle, $headScript, $headMeta, $basePath);
        }
    ),
);
