<?php
namespace OmniPro\MyBlog\UI\DataProvider\BlogList;



class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider

{
   public function __construct(
       $name,
       $primaryFieldName,
       $requestFieldName,
       \OmniPro\MyBlog\Model\ResourceModel\Blog\CollectionFactory $collectionFactory,
       array $meta = [],
       array $data =[]
   )
   {
       
        
          parent::__construct(
              $name,
              $primaryFieldName,
              $requestFieldName,
              $meta, $data );
              $this->collection = $collectionFactory->create();
    }
}
