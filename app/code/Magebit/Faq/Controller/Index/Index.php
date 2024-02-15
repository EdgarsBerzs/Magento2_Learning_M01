<?php

declare(strict_types=1);

namespace Magebit\Faq\Controller\Index;

use Magento\Framework\View\Result\Page;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface
{
    /**
     * @param PageFactory $pageFactory
     */
    public function __construct(
        protected PageFactory $pageFactory
    ) {}

    /**
     * @return Page
     */
    public function execute(): Page
    {
        return $this->pageFactory->create();
    }
}
