<?php

namespace Myvendor\Faqs\Block\Adminhtml;
use Myvendor\Faqs\Model\ResourceModel\ResCat\CollectionFactory;
use Magento\Framework\Data\Form\FormKey;


class Add extends \Magento\Framework\View\Element\Template
{
    protected $formKey;
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param CollectionFactory $collectionFactory
     * @param array $data
     *
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        CollectionFactory $collectionFactory,
        FormKey $formKey,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
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
            return $this->getUrl('faqs/robusta/add');
        // here controller_name is index, action is booking
    }
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
    public function getAllCategories()
    {
        /** @var \Myvendor\Faqs\Model\ResourceModel\ResCat\Collection $collection */
        $collection = $this->collectionFactory->create(); // Corrected variable name
        $collection->addFieldToSelect('*')->load();
        return $collection->getItems();
    }
}
