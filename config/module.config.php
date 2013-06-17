<?php

namespace JaztecCmsCore;

return array(
    /**
     * Setup assetmanager.
     */
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                __NAMESPACE__ => __DIR__ . '/../public',
            ),
        ),
    ),

    /**
     * Setup controllers.
     */
    'controllers'   => array(
        'invokables' => array(
            __NAMESPACE__ . '\Controller\IndexController' => __NAMESPACE__ . '\Controller\IndexController',
            __NAMESPACE__ . '\Controller\ApiController' => __NAMESPACE__ . '\Controller\ApiController',
        ),
    ),

    /**
     * Define JaztecCmsCore config entry.
     */
    'jaztec_cms_core' => array(
        // Finetune the application with module configurations.
    ),

    /**
     * Setup routes.
     */
    'router' => array(
        'routes' => array(
            'cms_home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => __NAMESPACE__ . '\Controller\IndexController',
                        'action'     => 'index',
                    ),
                ),
            ),
            'cms_api' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'   => array(
                    'route'         => '/api[/:action][/:url]',
                    'constraints'   => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'url'    => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults'      => array(
                        'controller' => __NAMESPACE__ . '\Controller\ApiController',
                        'action'        => 'index',
                    ),
                ),
            ),
        ),
    ),

    /**
     * Setup view paths.
     */
    'view_manager'  => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'jaztec_cms_core/layout'        => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'                     => __DIR__ . '/../view/error/404.phtml',
            'error/index'                   => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        ),
    ),

    /**
     * Doctrine setup
     */
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);
