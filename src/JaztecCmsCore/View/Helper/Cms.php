<?php

namespace JaztecCmsCore\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\HeadTitle;
use Zend\View\Helper\HeadMeta;
use Zend\View\Helper\HeadLink;
use Zend\View\Helper\HeadScript;
use Zend\View\Helper\HeadStyle;
use Zend\View\Helper\BasePath;

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
     * @var $headMeta \Zend\View\Helper\HeadMeta
     */
    protected $headMeta;

    /**
     * @var $headLink \Zend\View\Helper\HeadLink
     */
    protected $headLink;

    /**
     *
     * @var $headScript \Zend\View\Helper\HeadScript
     */
    protected $headScript;

    /**
     *
     * @var $headStyle \Zend\View\Helper\HeadStyle
     */
    protected $headStyle;

    /**
     * @var $basePath \Zend\View\Helper\BasePath
     */
    protected $basePath;

    /**
     * @param array $config
     */
    public function __construct(array $config, HeadTitle $headTitle, HeadLink $headLink,
        HeadStyle $headStyle, HeadScript $headScript, HeadMeta $headMeta, BasePath $basePath)
    {
        $this->config = $config;
        $this->headTitle = $headTitle;
        $this->headLink = $headLink;
        $this->headMeta = $headMeta;
        $this->headScript = $headScript;
        $this->headStyle = $headStyle;
        $this->basePath = $basePath;
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
        $title = isset($this->config['title']) ? $this->config['title'] : 'Jaztec CMS Default';

        return $this->headTitle->__invoke($title);
    }

    /**
     * Returns an instance of the meta helper.
     * 
     * @return \Zend\View\Helper\HeadMeta
     */
    public function meta()
    {
        $this->headMeta->appendName('viewport', 'width=device-width, initial-scale=1.0');

        return $this->headMeta->__invoke();
    }

    /**
     * Returns an instance of the link helper.
     *
     * @return \Zend\View\Helper\HeadLink
     */
    public function link()
    {
        return $this->headLink->__invoke(array('rel' => 'shortcut icon', 
            'type' => 'image/vnd.microsoft.icon',
            'href' => $this->basePath->__invoke() . '/images/favicon.ico'));
    }

    /**
     * Returns an instance of the script helper.
     * You should run the AngularJsApp helper first so the app is setup.
     *
     * @return \Zend\View\Helper\Script
     */
    public function script()
    {
        $this->headScript->appendFile($this->basePath->__invoke() . '/js/html5.js', 'text/javascript', array('conditional' => 'lt IE 9',));

        return $this->headScript->__invoke();
    }
}