<?php
namespace Myvendor\Faqs\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Myvendor\Faqs\Controller\Adminhtml\Robusta\Index as IndexController;
use Myvendor\Faqs\Model\CategoryFactory;
use Magento\Framework\Data\Form\FormKey;

class CategoryEdit extends Template
{
    protected $formKey;
    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param CategoryFactory $categoryFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        CategoryFactory $categoryFactory,
        FormKey $formKey,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->categoryFactory = $categoryFactory;
        $this->formKey=$formKey;
    }


    public function getRecordCategoryName()
    {
        $model = $this->categoryFactory->create();
        $id=$this->getRequest()->getParam('id');
        return $model->load($id)->getCategoryName();
    }
    public function getFormAction()
    {
            // companymodule is given in routes.xml
            // controller_name is folder name inside controller folder
            // action is php file name inside above controller_name folder
            return $this->getUrl('faqs/robusta/categoryedit');
        // here controller_name is index, action is booking
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

}
