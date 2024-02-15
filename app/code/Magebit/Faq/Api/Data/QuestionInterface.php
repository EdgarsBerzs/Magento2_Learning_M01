<?php
declare(strict_types=1);

namespace Magebit\Faq\Api\Data;

interface QuestionInterface
{

    const ID = 'id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const POSITION = 'position';
    const UPDATED = 'updated';

    /**
     * @return int | null | string
     */
    public function getID(): int | null | string;

    /**
     * @return string
     */
    public function getQuestion(): string;

    /**
     * @return string
     */
    public function getAnswer(): string;

    /**
     * @return bool
     */
    public function getStatus(): bool;

    /**
     * @return int
     */
    public function getPosition(): int;

    /**
     * @return string
     */
    public function getUpdatedAt(): string;

    /**
     * @param string $question
     * @return QuestionInterface
     */
    public function setQuestion(string $question): QuestionInterface;

    /**
     * @param string $answer
     * @return QuestionInterface
     */
    public function setAnswer(string $answer): QuestionInterface;

    /**
     * @param bool $status
     * @return QuestionInterface
     */
    public function setStatus(bool $status): QuestionInterface;

    /**
     * @param int $position
     * @return QuestionInterface
     */
    public function setPosition(int $position): QuestionInterface;
}
