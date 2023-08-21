<?php

namespace Myvendor\Faqs\Controller\Adminhtml\Robusta;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Myvendor\Faqs\Model\CategoryFactory;
use Magento\Framework\Controller\ResultFactory;

class CategoryEdit extends Action
{
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
        $recordId = $this->getRequest()->getParam('id'); // Make sure 'id' matches the parameter name in the URL
        $data = $this->getRequest()->getPostValue();
        if($data){
        try {
            $model = $this->categoryFactory->create();
            $model->load($recordId);
            $model->setData([
                'category_name' => $data['category_name'],
                // Set other fields here
            ]);

            $model->save();
            $this->messageManager->addSuccessMessage(__('Record Edited Successfully'));
            if (!$model->getId()) {
                $this->messageManager->addError(__('Record with ID %1 does not exist.', $recordId));
            }

        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
    }
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Edit FAQ Record'));
        return $resultPage;
    }
}
