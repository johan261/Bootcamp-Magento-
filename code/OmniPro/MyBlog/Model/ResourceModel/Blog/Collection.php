<?php
namespace OmniPro\MyBlog\Model\ResourceModel\Blog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'blog_id';
	protected $_eventPrefix = 'omnipro_myblog_blog_collection';
	protected $_eventObject = 'blog_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\OmniPro\MyBlog\Model\Blog::class, \OmniPro\MyBlog\Model\ResourceModel\Blog::class);
    }
}
