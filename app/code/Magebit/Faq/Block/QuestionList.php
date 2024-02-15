<?php

declare(strict_types=1);

namespace Magebit\Faq\Block;

use Magebit\Faq\Model\ResourceModel\Question\Collection;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use Magento\Framework\View\Element\BlockInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class QuestionList extends Template implements BlockInterface
{
    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        public CollectionFactory $collectionFactory,
        array $data = []
    ) {
        parent::__construct($context,$data);
    }

    /**
     * Gets a collection of all enabled questions
     *
     * @return Collection
     */
    public function getQuestions(): Collection
    {
        $questions = $this->collectionFactory->create();
        $questions->addFieldToFilter('status', 1);
        $questions->addOrder('position', 'DESC');
        return $questions;
    }
}
