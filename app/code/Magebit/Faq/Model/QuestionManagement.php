<?php

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Model\ResourceModel\Question as QuestionResource;
use Magebit\Faq\Api\QuestionManagementInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Psr\Log\LoggerInterface;

class QuestionManagement implements QuestionManagementInterface
{
    /**
     * @param QuestionResource $questionResource
     * @param QuestionFactory $questionFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        private QuestionResource $questionResource,
        private  QuestionFactory $questionFactory,
        private LoggerInterface $logger
    )
    {
    }

    /**
     * @param QuestionInterface $question
     * @return bool
     * @throws \Exception
     */
    public function enableQuestion(QuestionInterface $question): bool
    {
        try {
            $question->setStatus(true);
            $this->questionResource->save($question);
            return true;
        } catch (AlreadyExistsException $exception) {
            $this->logger->info($exception);
            return false;
        }
    }

    /**
     * @param QuestionInterface $question
     * @return bool
     * @throws \Exception
     */
    public function disableQuestion(QuestionInterface $question): bool
    {
        try {
            $question->setStatus(false);
            $this->questionResource->save($question);
            return true;
        } catch (AlreadyExistsException $exception) {
            $this->logger->info($exception);
            return false;
        }
    }
}
