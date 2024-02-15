<?php

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Model\QuestionFactory;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultInterface;

class Save extends Action implements HttpPostActionInterface
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
    )
    {
        parent::__construct($context);
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $data = $this->getRequest()->getPost();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $question = $this->questionFactory->create();

            if (empty($data['id'])) {
                $data['id'] = null;
            }

            $question->setData($data['faq_question']);
            $this->questionRepository->save($question);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
