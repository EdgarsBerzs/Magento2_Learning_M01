<?php

declare(strict_types=1);

namespace Magebit\Faq\Ui\Component\Form\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Save implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'sort_order' => 20,
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'faq_question_form.faq_question_form',
                                'actionName' => 'save',
                                'params' => [
                                    true,
                                    [
                                        'back' => 'stay'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'class_name' => 'Magento\Backend\Block\Widget\Button\SplitButton',
            'dropdown_button_aria_label' => __('Save options'),
            'options' => $this->getOptions()
        ];
    }

    /**
     * @return array[]
     */
    public function getOptions(): array
    {
        $options = [
            [
                'label' => __('Save & Close'),
                'id_hard' => 'save_and_back',
                'data_attribute' => [
                    'mage-init' => [
                        'buttonAdapter' => [
                            'actions' => [
                                [
                                    'targetName' => 'faq_question_form.faq_question_form',
                                    'actionName' => 'crazy',
                                    'params' => [
                                        true,
                                        ['back' => 'close']
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'on_click' => '',
            ]
        ];
        return $options;
    }
}
