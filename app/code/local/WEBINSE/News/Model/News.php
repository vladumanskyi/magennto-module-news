<?php

class WEBINSE_News_Model_News extends Mage_Core_Model_Abstract{
    public function __construct(){
        parent::_construct();
        $this->_init('webinse_news/news');
    }
}