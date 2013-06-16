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
        ),
    ),

    /**
     * Setup routes.
     */
    'router' => array(
        'routes' => array(
            'cms-home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => __NAMESPACE__ . '\Controller\IndexController',
                        'action'     => 'index',
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
            'jaztec-cms-core/layout'        => __DIR__ . '/../view/layout/layout.phtml',
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

);
