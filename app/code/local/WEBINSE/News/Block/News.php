<?php
class WEBINSE_News_BLock_News extends Mage_Core_Block_Template{
    public function _construct(){
        parent::_construct();
        $newsCollection = Mage::getModel('webinse_news/news')
            ->getCollection()
            ->addFilter('status','Enable')
            ->setOrder('date_created', 'DESC');
        $this->setCollection($newsCollection);
        $symbContent = Mage::getStoreConfig('webinsenews/webinse_news_group/webinse_num_input');
        Mage::register('symb_cont', $symbContent);
        $date_created = Mage::getStoreConfig('webinsenews/webinse_news_group/webinse_date_input');
        Mage::register('date_created', $date_created);
    }

    public function _prepareLayout(){
        parent::_prepareLayout();



        $pagination = Mage::getStoreConfig('webinsenews/webinse_news_group/webinse_news_input');
        $pager = $this->getLayout()->createBlock('page/html_pager','webinse_news.pager');
        $pager->setAvailableLimit(array($pagination=>$pagination,'all'=>'all'));
        $pager->setCollection($this->getCollection());
        $this->setChild('pager', $pager);
        $this->getCollection()->load();
        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

}