<?php
namespace OmniPro\MyBlog\Api;

use \OmniPro\MyBlog\Api\Data\BlogInterface;
use \OmniPro\MyBlog\Api\Data\BlogSearchResultInterface;

interface BlogRepositoryInterface
{
    /**
     * @param int $blog_id
     * @return \OmniPro\MyBlog\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($blog_id);

    /**
     * @param  \OmniPro\MyBlog\Api\Data\BlogInterface $omni_blog
     * @return \OmniPro\MyBlog\Api\Data\BlogInterface
     */
    public function save(BlogInterface $omni_blog);

    /**
     * @param  \OmniPro\MyBlog\Api\Data\BlogInterface $omni_blog
     * @return void
     */
    public function delete(BlogInterface $omni_blog);

    /**
     * @param  \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \OmniPro\MyBlog\Api\Data\BlogSearchResultInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}