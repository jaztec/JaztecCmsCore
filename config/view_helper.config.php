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
             * @var $headLink \Zend\View\Helper\HeadLink
             */
            $headLink = $pm->get('HeadLink');
            /**
             * @var $headStyle \Zend\View\Helper\HeadStyle
             */
            $headStyle = $pm->get('HeadStyle');
            /**
             * @var $headScript \Zend\View\Helper\HeadScript
             */
            $headScript = $pm->get('HeadScript');
            /**
             * @var $headMeta \Zend\View\Helper\HeadMeta
             */
            $headMeta = $pm->get('HeadMeta');
            /**
             * @var $basePath \Zend\View\Helper\BasePath
             */
            $basePath = $pm->get('BasePath');

            return new Cms($config['jaztec_cms_core'], $headLink, $headStyle,
                $headScript, $headMeta, $basePath);
        }
    ),
);
