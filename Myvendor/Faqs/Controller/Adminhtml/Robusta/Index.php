<?php

namespace Myvendor\Faqs\Controller\Adminhtml\Robusta;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Myvendor\Faqs\Model\FaqFactory;

class Index extends Action
{
    const MENU_ID = 'Myvendor_Faqs::faqs_crud';

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
        try {
            $data = $this->getRequest()->getPostValue();
            if ($data && isset($data['selected_records'])) {
                $model = $this->faqFactory->create();

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
        $resultPage->getConfig()->getTitle()->prepend(__('FAQs'));

        return $resultPage;
    }

}
