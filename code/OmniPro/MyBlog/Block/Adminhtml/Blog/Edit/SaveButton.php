<?php
namespace OmniPro\MyBlog\Block\Adminhtml\Blog\Edit;

class SaveButton extends GenericButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface
{
   public function getButtonData()
   {
       return[
           'label' => __('Save Blog'),
           'class' => 'save primary',
           'data_atribute' => [
               'mage-init' => ['button' => ['event' => 'save']],
               'form-role' => 'save'
           ],
           'sort_order' => 90

        ];
   }
}
