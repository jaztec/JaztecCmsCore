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
     * @var $basePath string
     */
    protected $basePath;

    /**
     * @var array
     */
    protected $config;

    /**
     * @param array $config
     * @param \Zend\View\Helper\HeadLink $link
     * @param \Zend\View\Helper\HeadScript $script
     * @param string $path
     */
    public function __construct(array $config, HeadLink $link, HeadScript $script, $path)
    {
        $this->headLink = $link;
        $this->headScript = $script;
        $this->config = $config;
        $this->basePath = (string) $path;
    }

    /**
     * Includes the AngularJS app into the views.
     */
    public function __invoke()
    {
        $this->includeMainScripts();
    }

    /**
     * Function will add all the required scripts to the HeadScript helper;
     */
    public function includeMainScripts()
    {
        $this->headScript->appendFile('http://code.angularjs.org/1.1.0/angular.js');
        $this->headScript->appendFile($this->basePath . '/cms/js/app.js');
        $this->headScript->appendFile($this->basePath . '/cms/js/controllers.js');
        $this->headScript->appendFile($this->basePath . '/cms/js/filters.js');
        $this->headScript->appendFile($this->basePath . '/cms/js/directives.js');
        $this->headScript->appendFile($this->basePath . '/cms/js/services.js');
        $this->headScript->appendFile('http://code.angularjs.org/1.1.0/angular-resource.min.js');
    }
}