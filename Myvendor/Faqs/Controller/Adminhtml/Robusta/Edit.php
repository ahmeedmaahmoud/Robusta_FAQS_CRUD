<?php

namespace Myvendor\Faqs\Controller\Adminhtml\Robusta;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Myvendor\Faqs\Model\FaqFactory;
use Magento\Framework\Controller\ResultFactory;

class Edit extends Action
{
    protected $resultPageFactory;
    protected $faqFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        FaqFactory $faqFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->faqFactory = $faqFactory;
    }

    public function execute()
    {
        $recordId = $this->getRequest()->getParam('id'); // Make sure 'id' matches the parameter name in the URL
        $data = $this->getRequest()->getPostValue();
        if($data){
        try {
            $model = $this->faqFactory->create();
            $model->load($recordId);
            $model->setData([
                'question' => $data['question'],
                'answer' => $data['answer'],
                'status' => $data['status'],
                'category_id'=>$data['category']
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
