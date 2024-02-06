<?php
declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(
        private Context $context,
        private PageFactory $pageFactory
    )
    {
        parent::__construct($context);
    }
    public function execute(): Page
    {
        /** TODO execute methode */
    }
}
