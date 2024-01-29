<?php

declare(strict_types = 1);

namespace Magebit\PageListWidget\Block\Widget;

use Magebit\PageListWidget\Model\Config\Source;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;

class PageList extends Template implements BlockInterface
{
    protected $_template = "page-list.phtml";

    /**
     * @param Source $source
     * @param Context $context
     */
    public function __construct(public Source $source, public Template\Context $context)
    {
        parent::__construct($context);
    }

    /**
     * @return array|string[]
     *
     * Gets all pages that where selected in the widget configuration page.
     */
    public function getSelectedPagesArray() : array
    {
        $allPages = $this->source->toOptionArray();

        if($this->getData('display') === "SomePages") {
            $selectedPages = $this->getData('pages');

            $selectedPages = array_map(function ($value) {
                return ['value' => trim($value)];
            }, explode(',', $selectedPages));

            $arraysToMatch = array_column($selectedPages, 'value');

            $arraysToMatch = array_filter($allPages, function ($item) use ($arraysToMatch)
            {
                return in_array($item['value'], $arraysToMatch);
            });

            return $arraysToMatch;

        }
        else if($this->getData('display') === "AllPages")
        {
            return $allPages;
        }
        return [];
    }
}
