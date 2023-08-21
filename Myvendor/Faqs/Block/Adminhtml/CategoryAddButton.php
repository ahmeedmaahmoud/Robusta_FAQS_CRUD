<?php
namespace Myvendor\Faqs\Block\Adminhtml;
class CategoryAddButton extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }
    /**
     * Return the URL to the "Add FAQ" page
     *
     * @return string
     */
    public function getAddUrl()
    {
        return $this->getUrl('faqs/robusta/categoryadd'); // Adjust the URL route as needed
    }

}
