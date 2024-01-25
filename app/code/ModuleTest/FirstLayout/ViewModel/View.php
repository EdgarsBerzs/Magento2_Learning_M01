<?php declare(strict_types=1);

namespace ModuleTest\FirstLayout\ViewModel;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class View implements ArgumentInterface
{
    public function getString(): string
    {
        return 'Passing a string from viewModel';

    }
}
