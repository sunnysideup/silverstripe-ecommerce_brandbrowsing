<?php

class ProductBrandDecorator extends DataObjectDecorator
{
    
    public function extraStatics()
    {
        return array(
            'db' => array(
                
            ),
            'has_one' => array(
                'Brand' => 'ProductBrand'
            )
        );
    }
    
    public function updateCMSFields(&$fields)
    {
        if ($brands = DataObject::get('ProductBrand')) {
            $fields->addFieldToTab('Root.Content.Main', $ddf = new DropDownField('BrandID', 'Brand', $brands->toDropDownMap()), 'FeaturedProduct');
            $ddf->setHasEmptyDefault(true);
        }
    }
}
