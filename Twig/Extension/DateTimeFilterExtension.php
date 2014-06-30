<?php

namespace Mohebifar\DateTimeBundle\Twig\Extension;

use Mohebifar\DateTimeBundle\Calendar\Proxy;
use Symfony\Bridge\Twig\Form\TwigRendererInterface;
use Symfony\Component\Form\FormView;


/**
 * @author Mohamad Mohebifar <netfars@gmail.com>
 */
class DateTimeFilterExtension extends \Twig_Extension
{

    private $service;

    /**
     *
     * @param TwigRendererInterface $twig
     * @param Proxy $service
     */
    public function __construct(TwigRendererInterface $twig, Proxy $service)
    {
        $this->service = $service;
        $this->renderer = $twig;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            'date_format' => new \Twig_Filter_Method($this, 'dateFilter'),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'form_datetime_js_asset' => new \Twig_Function_Method($this, 'renderJavascriptAsset', array('is_safe' => array('html'))),
            'form_datetime_js' => new \Twig_Function_Method($this, 'renderJavascript', array('is_safe' => array('html'))),
            'form_datetime_css' => new \Twig_Function_Node('Symfony\Bridge\Twig\Node\SearchAndRenderBlockNode', array('is_safe' => array('html'))),
        );
    }

    public function dateFilter($time, $format)
    {
        return $this->service->format($format, $time);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'mohebifar_date_time';
    }

    /**
     * Render Function Form Javascript
     *
     * @param FormView $view
     * @param bool $prototype
     *
     * @return string
     */
    public function renderJavascript(FormView $view, $prototype = false)
    {
        $block = $prototype ? 'javascript_prototype' : 'datetime_js';

        return $this->renderer->searchAndRenderBlock($view, $block);
    }

    public function renderJavascriptAsset(FormView $view, $prototype = false)
    {
        $block = 'javascript_asset';

        return $this->renderer->searchAndRenderBlock($view, $block);
    }
}
