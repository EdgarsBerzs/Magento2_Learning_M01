<?php

declare(strict_types=1);

namespace ModuleTest\FirstLayout\Controller\Layout;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;

class View implements ActionInterface
{
    private PageFactory $resultPageFactory;

    public function __construct(PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute(): Page
    {
        $resultPage = $this->resultPageFactory->create();
        /** $block = $resultPage->getLayout()->getBlock('moduletest.first.layout.example');
        $block->setData('parameter', 'Controller Data'); */
        return $resultPage;
    }
}
