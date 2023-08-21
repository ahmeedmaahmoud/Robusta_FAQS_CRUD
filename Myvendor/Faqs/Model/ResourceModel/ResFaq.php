<?php
namespace Myvendor\Faqs\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ResFaq extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('myvendor_faqs', 'FAQ_id'); // 'myvendor_faqs' is the table name, 'faq_id' is the primary key
    }
}
