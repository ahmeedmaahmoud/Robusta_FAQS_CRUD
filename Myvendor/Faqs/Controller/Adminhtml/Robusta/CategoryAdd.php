<?php
namespace Myvendor\Faqs\Controller\Adminhtml\Robusta;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Result\PageFactory;
use Myvendor\Faqs\Model\CategoryFactory;

class CategoryAdd extends Action
{
    protected $resultPageFactory;
    protected $collectionFactory;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param CategoryFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CategoryFactory $collectionFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function execute()
    {
        try {
            $data = $this->getRequest()->getPostValue(); // Use getPostValue() instead of casting to array
            if ($data) {
                $model = $this->collectionFactory->create();

                // Validate and sanitize data before setting it to the model
                $model->setData([
                    'category_name' => $data['category_name'],
                    // Set other fields here
                ]);

                $model->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
        }

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Add Category'));
        return $resultPage;
    }
}
