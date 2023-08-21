<?php
namespace Myvendor\Faqs\Block\Adminhtml;
class CategoryBackButton extends \Magento\Framework\View\Element\Template
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
        return $this->getUrl('exampleadminnewpage/robusta/categoryindex'); // Adjust the URL route as needed
    }

}
