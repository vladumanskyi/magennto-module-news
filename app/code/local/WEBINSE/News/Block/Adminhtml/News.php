<?php
class WEBINSE_News_Block_Adminhtml_News extends Mage_Adminhtml_Block_Widget_Grid_Container{

    public function _construct(){
        parent::_construct();
        $helper = Mage::helper('webinse_news');
        $this->_blockGroup = 'webinse_news';
        $this->_controller = 'adminhtml_news';

        $this->_headerText = $helper->__('News');

    }

}