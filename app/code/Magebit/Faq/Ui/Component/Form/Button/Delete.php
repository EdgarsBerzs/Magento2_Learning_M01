<?php

declare(strict_types=1);

namespace Magebit\Faq\Ui\Component\Form\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete extends Generic implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Delete'),
            'on_click' => sprintf("location.href = '%s'", $this->getBackUrl()),
            'class' => 'delete',
        ];
    }

    /**
     * @return string
     */
    private function getBackUrl(): string
    {
        return $this->getUrl('*/*/');
    }
}
