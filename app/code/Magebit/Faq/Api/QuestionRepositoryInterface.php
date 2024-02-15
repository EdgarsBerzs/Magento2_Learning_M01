<?php

declare(strict_types=1);

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\Data\QuestionSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface QuestionRepositoryInterface
{
    /**
     * Retrieves a question.
     *
     * @param int $id
     * @return QuestionInterface
     */
    public function getById(int $id): QuestionInterface;

    /**
     * Saves a question.
     *
     * @param QuestionInterface $question
     * @return QuestionInterface
     */
    public function save(QuestionInterface $question): QuestionInterface;

    /**
     * Retrieves all questions matching given criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria): QuestionSearchResultsInterface;

    /**
     * Deletes a question.
     *
     * @param QuestionInterface $question
     * @return bool
     */
    public function delete(QuestionInterface $question): bool;

    /**
     * Deletes a question by Id.
     *
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;
}
