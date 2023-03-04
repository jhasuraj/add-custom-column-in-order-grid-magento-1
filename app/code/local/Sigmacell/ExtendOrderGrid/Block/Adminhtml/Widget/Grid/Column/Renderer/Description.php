<?php 

class Sigmacell_ExtendOrderGrid_Block_Adminhtml_Widget_Grid_Column_Renderer_Description extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return $this->_geProductDescriptions($row);
    } 
    protected function _geProductDescriptions(Varien_Object $row)
    {   
        $increment_id = $row->getData('increment_id');
        $getOrder = Mage::getModel('sales/order')->loadByIncrementId($increment_id);
        $orderItems= $getOrder->getAllVisibleItems();
        
        $result = '';
        foreach($orderItems as $sItem) {
            $_product= Mage::getModel('catalog/product')->load($sItem->getProductId());
            if(($_product->getName() != '') && ($_product->getName() != null)) {
                $result .= "<p>".$_product->getName()."</p>"; 
            } 
            // if(($_product->getShortDescription() != '') && ($_product->getShortDescription() != null)) {
            //     $result .= "<p>".$_product->getShortDescription()."</p>"; 
            // } 
        }

        return $result;
    }
}