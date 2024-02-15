<?php

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\Question;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class InlineEdit extends Action
{
    /**
     * @param Context $context
     * @param QuestionRepositoryInterface $questionRepository
     */
    public function __construct(
        Context $context,
        private readonly QuestionRepositoryInterface $questionRepository
    ) {
        parent::__construct($context);
    }

    /**
     * Gets selected questions and edits then merges them in and saves them with the edited data
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $items = $this->getRequest()->getParam('items');
        $messages = [];
        $error = false;

        if(!count($items)) {
            $messages[] = __('Please correct data sent');
            $error = true;
        } else {
            foreach (array_keys($items) as $id) {
                /** @var Question $question */
                $question = $this->questionRepository->getById($id);
                $question->setData(array_merge($question->getData(), $items[$id]));
                $this->questionRepository->save($question);
            }
        }

        return $result->setData(
            [
                'messages' => $messages,
                'error' => $error
            ]
        );
    }
}
