<?php

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

class Edit extends Action implements HttpGetActionInterface
{
    /**
     * Gets the questions id,
     * checks if there even is an id on which it changes the forms title
     *
     * @return Page
     */
    public function execute(): Page
    {
        $pageResult = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $id = $this->getRequest()->getParam('id');

        if($id) {
            $pageResult->getConfig()->getTitle()->prepend(__('Edit Question'));
        } else {
            $pageResult->getConfig()->getTitle()->prepend(__('FAQ Question'));
        }
        return $pageResult;
    }
}
