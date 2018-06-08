<?php
/**
 * Created by pallab das , pallab.office@gmail.com
 * Copyright (C) 2017  2018
 * 
 * This file included in Pdas/Recordreceipt is licensed under OSL 3.0
 * 
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace Pdas\Recordreceipt\Controller\Adminhtml\Rrlist;

class Delete extends \Pdas\Recordreceipt\Controller\Adminhtml\Rrlist
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('rrlist_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Pdas\Recordreceipt\Model\Rrlist');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Rrlist.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['rrlist_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Rrlist to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
