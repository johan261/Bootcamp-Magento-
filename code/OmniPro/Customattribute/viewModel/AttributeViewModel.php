<?php
namespace OmniPro\Customattribute\viewModel;

class AttributeViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    public function __construct()
    {
        
    }

    public function getAttributeValue(){
          return 'Grande';
    }
}
