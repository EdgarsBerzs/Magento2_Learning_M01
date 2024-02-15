<?php
declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

class Index extends Action
{

    /**
     * @return Page
     */
    public function execute(): Page
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Magebit_Faq::home');
        $resultPage->getConfig()->getTitle()->prepend(__('Frequently Asked Questions'));

        return $resultPage;
    }
}
