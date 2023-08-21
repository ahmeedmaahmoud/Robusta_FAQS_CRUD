<?php
namespace Myvendor\Faqs\Model;
use Myvendor\Faqs\Model\ResourceModel\ResFaq;
use Magento\Framework\Model\AbstractModel;

class Faq extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Myvendor\Faqs\Model\ResourceModel\ResFaq');
    }
}
