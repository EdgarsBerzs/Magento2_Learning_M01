<?php

declare(strict_types=1);

namespace Magebit\Faq\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface QuestionSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return array[]
     */
    public function getItems(): array;

    /**
     * @param QuestionInterface[] $items
     * @return QuestionSearchResultsInterface[]
     */
    public function setItems(array $items): array;
}
