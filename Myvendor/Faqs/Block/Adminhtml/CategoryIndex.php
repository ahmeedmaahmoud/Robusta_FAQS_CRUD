<?php
namespace Myvendor\Faqs\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Myvendor\Faqs\Model\ResourceModel\ResCat\CollectionFactory;
use Magento\Framework\Data\Form\FormKey;

class CategoryIndex extends Template
{
    protected $formKey;

    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param CollectionFactory $collectionFactory // Corrected variable name
     * @param FormKey $formKey
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory, // Corrected variable name
        FormKey $formKey,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory; // Corrected variable name
        $this->formKey = $formKey;
    }

    public function getAllRecords()
    {
        /** @var \Myvendor\Faqs\Model\ResourceModel\ResCat\Collection $collection */
        $collection = $this->collectionFactory->create(); // Corrected variable name
        $collection->addFieldToSelect('*')->load();
        return $collection->getItems();
    }

    public function getDeleteSelectedActionUrl()
    {
        return $this->getUrl('*/*/*');
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    public function getEditActionUrl($id)
    {
        return $this->getUrl("faqs/robusta/categoryedit/$id", ['id' => $id]);
    }
}
