<?php

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\QuestionFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Throwable;

class Delete extends Action implements HttpPostActionInterface
{

    /**
     * @param Context $context
     * @param QuestionRepositoryInterface $questionRepository
     * @param QuestionFactory $questionFactory
     */
    public function __construct(
        Context $context,
        private QuestionRepositoryInterface $questionRepository,
        private QuestionFactory $questionFactory
    ) {
        parent::__construct($context);
    }

    /**
     * Gets the id of the question and deletes it
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $id = (int) $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();

        if(!$id) {
            $this->messageManager->addErrorMessage(__('We can\'t find a question to delete'));
            return $resultRedirect->setPath('*/*/');
        }
        try {
            $this->questionRepository->deleteById($id);

            $this->messageManager->addSuccessMessage(__('The question has been deleted.'));
        } catch (Throwable $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }

        return $resultRedirect->setPath('*/*/');
    }
}
