<?php
namespace OmniPro\MyBlog\Block\Adminhtml\Blog\Edit;

class GenericButton 
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context
     * 
     */

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context
    ){
         $this->context = $context;
    }
    public function getBackUrl(){
        return $this->getUrl('*/blog/');
    }
    public function getUrl($route = '', $params = []){
            return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
