<?php

declare(strict_types = 1);

namespace Magebit\PageListWidget\Model\Config;

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\Exception\LocalizedException;

class Source implements OptionSourceInterface
{

    /**
     * @param PageRepositoryInterface $pageRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(public PageRepositoryInterface $pageRepository, public SearchCriteriaBuilder $searchCriteriaBuilder)
    {

    }

    /**
     * @return array
     * @throws LocalizedException
     */
    public function toOptionArray(): array
    {
        $options = [];

        $searchCriteria = $this->searchCriteriaBuilder->addFilter('is_active', true)->create();
        $pages = $this->pageRepository->getList($searchCriteria)->getItems();

        foreach ($pages as $page) {
            $options[] = ['value' => $page->getIdentifier(), 'label' => $page->getTitle()];
        }

        return $options;
    }
}
