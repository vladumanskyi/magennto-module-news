<?php

class WEBINSE_News_IndexController extends Mage_Core_Controller_Front_Action{

    public function indexAction()
    {
        /*$resource = Mage::getSingleton('core/resource');
        $read = $resource->getConnection('core_read');
        $table = $resource->getTableName('webinse_news/table_news');

        $select = $read->select()
            ->from($table, array('id', 'title', 'content','date_created'))
            ->where('status = 1')
            ->order('date_created', 'ASC');
        $news = $read->fetchAll($select);
        print_r($news);
        $getUrl = Mage::getUrl('news/index/view');
        Mage::register('news', $news);
        Mage::register('url',$getUrl);

        $this->loadLayout();
        $this->renderLayout();*/

       /* $news = Mage::getModel('webinse_news/news')->getCollection();
        $viewUrl = Mage::getUrl('news/index/view');

        echo '<h1>News</h1>';
        foreach($news as $item){

            echo '<h2><a href="' . $viewUrl . '?id=' . $item->getId() . '">' . $item->getTitle() . '</a></h2>';
        }
        //print_r($news);
       */
        $this->loadLayout();
        $this->renderLayout();
    }
    public function viewAction()
    {
        /*$newsId = Mage::app()->getRequest()->getParam('id', 0);
        $news = Mage::getModel('webinse_news/news')->load($newsId);

        if ($news->getId() > 0) {
            echo '<h1>' . $news->getTitle() . '</h1>';
            echo '<div class="content">' . $news->getContent() . '</div>';
            echo '<div class="date_created">' . $news['date_created'] . '</div>';

        } else {
            $this->_forward('noRoute');
        }*/
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