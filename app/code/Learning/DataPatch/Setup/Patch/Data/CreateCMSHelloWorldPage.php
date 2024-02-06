<?php
declare(strict_types=1);

namespace Learning\DataPatch\Setup\Patch\Data;

use Magento\Cms\Api\Data\PageInterface;
use Magento\Cms\Api\Data\PageInterfaceFactory;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

class CreateCMSHelloWorldPage implements
    DataPatchInterface,
    PatchRevertableInterface
{

    const KEY_TITLE = 'title';
    const KEY_BODY = 'body';
    const KEY_ID = 'id';

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param PageRepositoryInterface $pageRepository
     * @param PageInterfaceFactory $pageInterfaceFactory
     */
    public function __construct(
        public ModuleDataSetupInterface $moduleDataSetup,
        public PageRepositoryInterface $pageRepository,
        public PageInterfaceFactory $pageInterfaceFactory
    ) {

    }

    /**
     * @inheritdoc
     */
    public function apply(): void
    {

        $pages = [
            [self::KEY_TITLE => 'test2', self::KEY_ID => 'test2', self::KEY_BODY => 'body of test1'],
            [self::KEY_TITLE => 'test3', self::KEY_ID => 'test3', self::KEY_BODY => 'body of test2'],
            [self::KEY_TITLE => 'test4', self::KEY_ID => 'test4', self::KEY_BODY => 'body of test3'],
            [self::KEY_TITLE => 'test5', self::KEY_ID => 'test5', self::KEY_BODY => 'body of test4'],
            [self::KEY_TITLE => 'test6', self::KEY_ID => 'test6', self::KEY_BODY => 'body of test5'],
        ];

        $this->moduleDataSetup->getConnection()->startSetup();

        try {
            foreach ($pages as $page) {
                /** @var PageInterface $pageObject */
                $pageObject = $this->pageInterfaceFactory->create();
                $pageObject->setTitle($page[self::KEY_TITLE]);
                $pageObject->setIdentifier($page[self::KEY_ID]);
                $pageObject->setContent($page[self::KEY_BODY]);
                $this->pageRepository->save($pageObject);
            }
        } catch (LocalizedException $e) {
            echo $e->getMessage();
        }

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies(): array
    {
        return  [];
    }

    public function revert(): void
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @inheritdoc
     */
    public function getAliases(): array
    {
        return [];
    }
}
