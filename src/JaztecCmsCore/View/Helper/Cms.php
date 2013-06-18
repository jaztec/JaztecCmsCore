<?php

namespace JaztecCmsCore\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\HeadTitle;
use Zend\View\Helper\HeadMeta;
use Zend\View\Helper\HeadLink;
use Zend\View\Helper\HeadScript;
use Zend\View\Helper\HeadStyle;
use Zend\View\Helper\BasePath;

/**
 * View helper for the CMS application. It will load all needed library's
 * into the application.
 */
class Cms extends AbstractHelper
{
    /**
     * @var $config array
     */
    protected $config;

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
     * @param \Zend\View\Helper\HeadLink $headLink
     * @param \Zend\View\Helper\HeadStyle $headStyle
     * @param \Zend\View\Helper\HeadScript $headScript
     * @param \Zend\View\Helper\HeadMeta $headMeta
     * @param \Zend\View\Helper\BasePath $basePath
     */
    public function __construct(array $config, HeadLink $headLink,
        HeadStyle $headStyle, HeadScript $headScript, HeadMeta $headMeta, BasePath $basePath)
    {
        $this->config = $config;
        $this->headLink = $headLink;
        $this->headMeta = $headMeta;
        $this->headScript = $headScript;
        $this->headStyle = $headStyle;
        $this->basePath = $basePath;
    }

    /**
     * Returns an instance of the meta helper.
     * 
     * @return \Zend\View\Helper\HeadMeta
     */
    public function meta()
    {
        $this->headMeta->appendName('viewport', 'width=device-width, initial-scale=1.0');
        $this->headMeta->setCharset('utf-8');

        return $this->headMeta->__invoke();
    }

    /**
     * Returns an instance of the link helper.
     *
     * @return \Zend\View\Helper\HeadLink
     */
    public function link()
    {
        $path = $this->basePath->__invoke();
        $this->headLink->prependStylesheet($path . '/css/bootstrap-responsive.min.css');
        $this->headLink->prependStylesheet($path . '/css/bootstrap.min.css');

        return $this->headLink->__invoke(array('rel' => 'shortcut icon', 
            'type' => 'image/vnd.microsoft.icon',
            'href' => $this->basePath->__invoke() . '/images/favicon.ico'));
    }

    /**
     * Returns an instance of the script helper.
     * You should run the AngularJsApp helper first so the app is set up.
     *
     * @return \Zend\View\Helper\Script
     */
    public function script()
    {
        $path = $this->basePath->__invoke();
        $this->headScript->prependFile($path . '/js/html5.js', 'text/javascript', array('conditional' => 'lt IE 9',));
        $this->headScript->prependFile($path . '/js/bootstrap.min.js', 'text/javascript');
        $this->headScript->prependFile('http://code.jquery.com/jquery-latest.min.js');

        return $this->headScript->__invoke();
    }
}