<?php

namespace Myvendor\Faqs\Controller\Adminhtml\Robusta;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Myvendor\Faqs\Model\CategoryFactory;

class CategoryIndex extends Action
{
    const MENU_ID = 'Magento_Backend::Myvendor_Faqs::Category_crud'; // Updated MENU_ID

    protected $resultPageFactory;
    protected $categoryFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CategoryFactory $categoryFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->categoryFactory = $categoryFactory;
    }

    public function execute()
    {
        try {
            $data = $this->getRequest()->getPostValue();
            if ($data && isset($data['selected_records'])) {
                $model = $this->categoryFactory->create();

                foreach ($data['selected_records'] as $element_id) {
                    $model->load($element_id)->delete();
                }
                $this->messageManager->addSuccessMessage(__("Data Deleted Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
        }
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(static::MENU_ID);
        $resultPage->getConfig()->getTitle()->prepend(__('Categories'));

        return $resultPage;
    }
}
