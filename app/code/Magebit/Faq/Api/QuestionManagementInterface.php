<?php

declare(strict_types=1);

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;

interface QuestionManagementInterface
{
    /**
     * Enables a question (status = true)
     *
     * @param QuestionInterface $question
     * @return bool
     */
    public function enableQuestion(QuestionInterface $question): bool;

    /**
     * Disables a question (status = false)
     *
     * @param QuestionInterface $question
     * @return bool
     */
    public function disableQuestion(QuestionInterface $question): bool;
}
