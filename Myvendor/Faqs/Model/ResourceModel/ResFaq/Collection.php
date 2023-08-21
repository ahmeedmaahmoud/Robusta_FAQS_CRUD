<?php
namespace Myvendor\Faqs\Model\ResourceModel\ResFaq;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Myvendor\Faqs\Model\Faq', 'Myvendor\Faqs\Model\ResourceModel\ResFaq');
    }
}
