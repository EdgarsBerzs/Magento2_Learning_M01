<?php

namespace ModuleTest\FirstLayout\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class User extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('user_profile', 'id');
    }
}
