<?php

namespace JaztecCmsCore\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\HeadScript;
use Zend\View\Helper\HeadLink;

/**
 * View Helper for loading all the AngularJS files forming the JaztecCMS.
 */
class AngularJsApp extends AbstractHelper
{
    /**
     * @var \Zend\View\Helper\HeadScript
     */
    protected $headScript;

    /**
     * @var \Zend\View\Helper\HeadLink
     */
    protected $headLink;

    /**
     * @var array
     */
    protected $config;

    /**
     * @param array $config
     * @param \Zend\View\Helper\HeadLink $link
     * @param \Zend\View\Helper\HeadScript $script
     */
    public function __construct(array $config, HeadLink $link, HeadScript $script)
    {
        $this->headLink = $link;
        $this->headScript = $script;
        $this->config = $config;
    }
}