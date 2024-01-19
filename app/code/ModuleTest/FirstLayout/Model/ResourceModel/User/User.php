<?php

namespace ModuleTest\FirstLayout\Model\ResourceModel\User;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class User extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(\ModuleTest\FirstLayout\Model\User::class, \ModuleTest\FirstLayout\Model\ResourceModel\User::class);
    }
}
