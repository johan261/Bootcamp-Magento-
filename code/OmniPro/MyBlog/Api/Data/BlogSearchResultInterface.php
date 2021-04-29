<?php
namespace OmniPro\MyBlog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;


interface BlogSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \OmniPro\MyBlog\Api\Data\BlogInterface[]
     */
    public function getItems();

    /**
     * @param \OmniPro\MyBlog\Api\Data\BlogInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
