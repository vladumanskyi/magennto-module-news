<?php

class WEBINSE_News_IndexController extends Mage_Core_Controller_Front_Action{

    public function indexAction()
    {

        $this->loadLayout();
        $this->renderLayout();
    }
    public function viewAction()
    {

        $newsId = Mage::app()->getRequest()->getParam('id', 0);
        $news = Mage::getModel('webinse_news/news')
            ->load($newsId);


        if ($news->getId() > 0) {
            $this->loadLayout();
            $this->getLayout()->getBlock('news.content')->assign(array(
                "newsItem" => $news,
            ));
            $this->renderLayout();
        } else {
            $this->_forward('noRoute');
        }
    }

}