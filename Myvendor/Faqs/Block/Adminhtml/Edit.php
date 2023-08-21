<?php
namespace Myvendor\Faqs\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Myvendor\Faqs\Controller\Adminhtml\Robusta\Index as IndexController;
use Myvendor\Faqs\Model\FaqFactory;
use Myvendor\Faqs\Model\CategoryFactory;
use Myvendor\Faqs\Model\ResourceModel\ResCat\CollectionFactory;
use Magento\Framework\Data\Form\FormKey;

class Edit extends Template
{
    protected $formKey;
    protected $faqFactory;
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
        CollectionFactory $collectionFactory,
        CategoryFactory $categoryFactory,
        FaqFactory $faqFactory,
        FormKey $formKey,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->faqFactory = $faqFactory;
        $this->collectionFactory = $collectionFactory;
        $this->categoryFactory = $categoryFactory;
        $this->formKey=$formKey;
    }

    public function getRecordQuestion()
    {
        $model = $this->faqFactory ->create();
        $id=$this->getRequest()->getParam('id');
        return $model->load($id)->getQuestion();
    }
    public function getRecordAnswer()
    {
        $model = $this->faqFactory ->create();
        $id=$this->getRequest()->getParam('id');
        return $model->load($id)->getAnswer();
    }
    public function getRecordStatus()
    {
        $model = $this->faqFactory ->create();
        $id=$this->getRequest()->getParam('id');
        return $model->load($id)->getStatus();
    }
    public function getRecordCategory()
    {
        $model = $this->faqFactory->create();
        $id=$this->getRequest()->getParam('id');
        $category_id=$model->load($id)->getCategoryId();
        $newmodel=$this->categoryFactory->create();
        return $newmodel->load($category_id)->getCategoryName();
    }
    public function getRecordCategoryID()
    {
        $model = $this->faqFactory->create();
        $id=$this->getRequest()->getParam('id');
        return $model->load($id)->getCategoryId();
    }
    public function getFormAction()
    {
            // companymodule is given in routes.xml
            // controller_name is folder name inside controller folder
            // action is php file name inside above controller_name folder
            return $this->getUrl('faqs/robusta/edit');
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
