<?php

namespace Magebit\PageListWidget\Model\Config;

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\Exception\LocalizedException;

class Source implements OptionSourceInterface
{

    /**
     * @var PageRepositoryInterface
     */
    protected PageRepositoryInterface $pageRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected SearchCriteriaBuilder $searchCriteriaBuilder;

    public function __construct(PageRepositoryInterface $pageRepository, SearchCriteriaBuilder $searchCriteriaBuilder)
    {
        $this->pageRepository = $pageRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }


    /**
     * @return array
     * @throws LocalizedException
     */
    public function toOptionArray(): array
    {
        $options = [];

        $searchCriteria = $this->searchCriteriaBuilder->create();
        $pages = $this->pageRepository->getList($searchCriteria)->getItems();

        foreach ($pages as $page)
        {
            $options[] = ['value' => $page->getIdentifier(), 'label' => $page->getTitle()];
        }

        return $options;
    }
}
