<?php

class WEBINSE_News_Block_Adminhtml_News_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'webinse_news';
        $this->_controller = 'adminhtml_news';
        $id = $this->getRequest()->getParam('id');
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = " function saveAndContinueEdit(){
            editForm.submit($('edit_form').action+'continue');

        }
    ";


    }

    public function getHeaderText()
    {
        $helper = Mage::helper('webinse_news');
        $model = Mage::registry('current_news');

        if ($model->getId()) {
            return $helper->__("Edit News item '%s'", $this->escapeHtml($model->getTitle()));
        } else {
            return $helper->__("Add News item");
        }
    }

}