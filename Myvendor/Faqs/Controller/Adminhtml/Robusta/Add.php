<?php
namespace Myvendor\Faqs\Controller\Adminhtml\Robusta;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Result\PageFactory;
use Myvendor\Faqs\Model\FaqFactory;

class Add extends Action
{
    protected $resultPageFactory;
    protected $faqFactory;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param FaqFactory $faqFactory
     */
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
            $data = $this->getRequest()->getPostValue(); // Use getPostValue() instead of casting to array
            if ($data) {
                $model = $this->faqFactory->create();

                // Validate and sanitize data before setting it to the model
                $model->setData([
                    'question' => $data['question'],
                    'answer' => $data['answer'],
                    'status' => $data['status'],
                    'category_id'=>$data['category_id']
                    // Set other fields here
                ]);

                $model->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
        }

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Add FAQ'));
        return $resultPage;
    }
}
