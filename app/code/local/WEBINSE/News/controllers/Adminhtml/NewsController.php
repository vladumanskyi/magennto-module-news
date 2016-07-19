<?php

class WEBINSE_News_Adminhtml_NewsController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('webinse_news');
        $this->_addContent($this->getLayout()->createBlock('webinse_news/adminhtml_news'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        Mage::register('current_news', Mage::getModel('webinse_news/news')->load($id));

        $this->loadLayout()->_setActiveMenu('webinse_news');
        $this->_addContent($this->getLayout()->createBlock('webinse_news/adminhtml_news_edit'));
        $this->renderLayout();
    }



    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            $continue = $this->getRequest()->getParam('continue');
            try {
                $model = Mage::getModel('webinse_news/news');
                $model->setData($data)->setId($this->getRequest()->getParam('id'));
                if(!$model->getCreated()){
                    $model->setCreated(now());
                }
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('News was saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                if(!isset($continue)){
                    $this->_redirect('*/*/');
                }else{
                    $this->_redirect('*/*/edit', array(
                        'id' => $this->getRequest()->getParam('id')
                    ));
                }
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;

        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }


    public function deleteAction()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('webinse_news/news')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('News was deleted successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }



}