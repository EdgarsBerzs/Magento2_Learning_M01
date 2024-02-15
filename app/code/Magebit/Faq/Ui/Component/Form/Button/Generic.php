<?php

declare(strict_types=1);

namespace Magebit\Faq\Ui\Component\Form\Button;

use Magento\Framework\UrlInterface;

class Generic
{
    /**
     * @param UrlInterface $url
     */
    public function __construct(
        private UrlInterface $url
    ) {}

    /**
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->url->getUrl($route, $params);
    }
}
