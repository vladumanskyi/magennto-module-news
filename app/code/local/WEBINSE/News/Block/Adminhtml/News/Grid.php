<?php
class WEBINSE_News_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid{
    protected function _prepareCollection(){
        $collection = Mage::getModel('webinse_news/news')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns(){
        $helper = Mage::helper('webinse_news');

        $this->addColumn('id',array(
            'header' => $helper->__('id'),
            'index'=> 'id'
            ));

        $this->addColumn('title',array(
            'header' => $helper->__('title'),
            'index'=> 'title',
            'type'=>'text'
        ));

        $this->addColumn('status',array(
            'header' => $helper->__('status'),
            'index'=> 'status',
            'type'=>'text',
            
        ));

        $this->addColumn('date_created',array(
            'header' => $helper->__('date_created'),
            'index'=> 'date_created',
            'type'=>'date'
        ));

        $this->addColumn('date_modified',array(
            'header' => $helper->__('date_modified'),
            'index'=> 'date_modified',
            'type'=>'date'
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($model)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $model->getId(),
        ));
    }
}