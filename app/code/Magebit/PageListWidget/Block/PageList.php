<?php

namespace Magebit\PageListWidget\Block;


use Magebit\PageListWidget\Model\Config\Source;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;

class PageList extends Template implements BlockInterface
{
    protected $_template = "page-list.phtml";

    /**
     * @var Source
     */
    protected Source $source;

    /**
     * @param Source $source
     * @param Context $context
     */
    public function __construct(Source $source, Template\Context $context)
    {
        parent::__construct($context);
        $this->source = $source;
    }

    /**
     * @return array|string[]|string
     */
    public function getSelectedPagesArray()
    {
        $allPages = $this->source->toOptionArray();

        if($this->getData('display') == "SomePages")
        {
            $selectedPages = $this->getData('pages');

            $selectedPagesArray = is_array($selectedPages) ? $selectedPages : array_map(function ($value) {
                return ['value' => trim($value)];
            }, explode(',', $selectedPages));

            $ArraysToMatch = array_column($selectedPagesArray, 'value');

            return array_filter($allPages, function ($item) use ($ArraysToMatch)
            {
                return in_array($item['value'], $ArraysToMatch);
            });

        }
        else if($this->getData('display') == "AllPages")
        {
            return $allPages;
        }

        return "error";
    }
}
