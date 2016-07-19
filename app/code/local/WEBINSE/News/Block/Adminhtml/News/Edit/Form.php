<?php

class WEBINSE_News_Block_Adminhtml_News_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $helper = Mage::helper('webinse_news');
        $model = Mage::registry('current_news');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $this->setForm($form);
        //print_r($model);


        $form['text'] = 'test';
        $fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('News Information')));

        $fieldset->addField('title', 'text', array(
            'label' => $helper->__('Title'),
            'required' => true,
            'name' => 'title',
            'value'=>$model->getTitle()
        ));

        $fieldset->addField('status','select',array(
            'label' => $helper->__('Status'),
            'required'=>true,
            'name'=>'status',
            'values'=>array("Enable"=>'Enable',"Disable"=>'Disable'),
            'value'=>($model->getStatus() == 'Disable') ? 'Disable' : 'Enable'
        ));

        $fieldset->addField('content', 'editor', array(
            'label' => $helper->__('Content'),
            'required' => true,
            'name' => 'content',
            'value'=>$model->getContent()
        ));

        $fieldset->addField('date_created', 'hidden', array(
            'name' => 'date_created',
            'value' => (!empty($model->getDateCreated())) ? $model->getDateCreated() : date('Y-m-d h:i:s')
        ));

        $fieldset->addField('date_modified', 'hidden', array(
            'name' => 'date_modified',
            'value' =>  date('Y-m-d h:i:s')
        ));





        $form->setUseContainer(true);

        if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
            $form->setValues($data);
        } else {
           // $form->setValues($model->getData());
        }

        return parent::_prepareForm();
    }

}