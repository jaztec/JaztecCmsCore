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
);
