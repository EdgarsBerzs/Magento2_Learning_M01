<?php

namespace ModuleTest\FirstLayout\Block;

use Magento\Framework\View\Element\Template;

class Display extends Template
{
    public function __construct(Template\Context $context)
    {
        parent::__construct($context);
    }

    public function sayWelcome(): string
    {
        return ('Welcome!');
    }
}
