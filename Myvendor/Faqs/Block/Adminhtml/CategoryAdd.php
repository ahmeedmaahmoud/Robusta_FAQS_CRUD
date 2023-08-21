<?php

namespace Myvendor\Faqs\Block\Adminhtml;
use Magento\Framework\Data\Form\FormKey;


class CategoryAdd extends \Magento\Framework\View\Element\Template
{
    protected $formKey;
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     *
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        FormKey $formKey,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->formKey=$formKey;
       }

    /**
     * Get form action URL for POST booking request
     *
     * @return string
     */
    public function getFormAction()
    {
            // companymodule is given in routes.xml
            // controller_name is folder name inside controller folder
            // action is php file name inside above controller_name folder
            return $this->getUrl('faqs/robusta/categoryadd');
        // here controller_name is index, action is booking
    }
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
}
