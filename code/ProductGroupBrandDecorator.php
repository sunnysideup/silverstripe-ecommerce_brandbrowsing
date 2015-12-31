<?php

class ProductGroupBrandDecorator extends DataObjectDecorator
{
    
    public static $currentbrand = null;
    
    
    /**
     * Dropdown form that allows choosing a different brand to browse by.
     */
    public function ChooseBrandForm()
    {
    }
    
    
    public function updateFilter(&$filter)
    {
        if ($brand = $this->owner->CurrentBrand()) {
            if ($filter == "" || !$filter) {
                $filter = "";
            } else {
                $filter = " AND ";
            }

            $filter .= "\"BrandID\" = ".$brand->ID;
        }
    }
    
    public function CurrentBrand()
    {
        if (self::$currentbrand) {
            return self::$currentbrand;
        }
        
        $brandid = (int)Controller::curr()->getRequest()->getVar('Brand');
        if (!$brandid) {
            $brandid = Session::get('Ecommerce.CurrentBrand');
        }
        
        if ($brandid && $brand = DataObject::get_by_id('ProductBrand', $brandid)) {
            Session::set('Ecommerce.CurrentBrand', $brand->ID);
            self::$currentbrand = $brand;
            return $brand;
        }
        
        return null;
    }
}

class ProductGroup_ControllerBrandDecorator extends Extension
{
    
    public function ViewAllLink()
    {
        return $this->owner->Link('viewallproducts');
    }
    
    public function viewallproducts()
    {
        Session::clear('Ecommerce.CurrentBrand');
        Director::redirect($this->owner->Link());
        return;
    }
}
