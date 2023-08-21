<?php
namespace Myvendor\Faqs\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Myvendor\Faqs\Controller\Adminhtml\Robusta\Index as IndexController;
use Myvendor\Faqs\Model\ResourceModel\ResFaq\CollectionFactory;
use Myvendor\Faqs\Model\CategoryFactory;
use Magento\Framework\Data\Form\FormKey;

class Index extends Template
{
    protected $formKey;
    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param CollectionFactory $CollectionFactory
     * @param CategoryFactory $categoryFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        CollectionFactory $CollectionFactory,
        CategoryFactory $categoryFactory,
        FormKey $formKey,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->CollectionFactory  = $CollectionFactory;
        $this->categoryFactory = $categoryFactory;
        $this->formKey=$formKey;
    }

    public function getAllRecords()
    {
        /** @var Collection $Collection */
        $Collection = $this->CollectionFactory ->create();
        $Collection->addFieldToSelect('*')->load();
        return $Collection->getItems();
    }
    public function getDeleteSelectedActionUrl()
    {
        return $this->getUrl('*/*/*');
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
    public function getEditActionUrl($id){
        return $this->getUrl("faqs/robusta/edit/id/$id");
    }
    public function getCategory_Name($id)
    {
        $model = $this->categoryFactory->create();
        return $model->load($id)->getCategoryName();
    }
}
