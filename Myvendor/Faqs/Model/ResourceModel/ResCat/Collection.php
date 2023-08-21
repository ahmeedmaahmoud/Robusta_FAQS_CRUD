<?php
namespace Myvendor\Faqs\Model\ResourceModel\ResCat;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Myvendor\Faqs\Model\Category', 'Myvendor\Faqs\Model\ResourceModel\ResCat');
    }
}
