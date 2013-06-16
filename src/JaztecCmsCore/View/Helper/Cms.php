<?php

namespace JaztecCmsCore\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\HeadTitle;

class Cms extends AbstractHelper
{
    /**
     * @var $config array
     */
    protected $config;

    /**
     * @var $headTitle \Zend\View\Helper\HeadTitle
     */
    protected $headTitle;

    /**
     * @param array $config
     */
    public function __construct(array $config, HeadTitle $headTitle)
    {
        $this->config = $config;
        $this->headTitle = $headTitle;
    }

    /**
     * Returns an instance of the HeadTitle with the title defined in the
     * configuration.
     *
     * @return \Zend\View\Helper\HeadTitle
     */
    public function title()
    {
        // Check if the title is set in the configuration.
        $title = isset($config['jaztec-cms-core']['title']) ?: 'Jaztec CMS Default';

        return $this->headTitle->__invoke($title);
    }
}