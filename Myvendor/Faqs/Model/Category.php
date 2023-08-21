<?php
namespace Myvendor\Faqs\Model;
use Myvendor\Faqs\Model\ResourceModel\Rescat;
use Magento\Framework\Model\AbstractModel;

class category extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Myvendor\Faqs\Model\ResourceModel\Rescat');
    }
}
