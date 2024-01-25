<?php

namespace ModuleTest\ModelTest\Block;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterface;

class Display extends Template
{

    private ProductRepositoryInterface $productRepository;

    public function __construct(Template\Context $context ,ProductRepositoryInterface $productRepository)
    {
        parent::__construct($context);
        $this->productRepository = $productRepository;
    }

    public function getProductByID()
    {
        $product = $this->productRepository->getById(2);
        return $product;
    }
}
