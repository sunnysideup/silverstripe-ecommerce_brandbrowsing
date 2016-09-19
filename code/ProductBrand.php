<?php

class ProductBrand extends DataObject
{
    public static $singular_name = 'brand';
    public static $plural_name = 'brands';
    
    public static $db = array(
        'Name' => 'Varchar(255)'
        //website??
    );
    
    public static $has_one = array(
        'Logo' => 'Image'
    );
    
    public static $default_sort = 'Name ASC';
    
    public static $summary_fields = array(
        'Name' => 'Name',
        'Logo.Name' => 'Logo'
    );
    
    public static $searchable_fields = array(
        "Name" => array(
                "field" => "TextField"
        )
    );
    
    public function Link()
    {
        $brandspage = Controller::curr()->data();
        if ($brandspage->ProductGroupID && $group = $brandspage->ProductGroup()) {
            return $group->Link()."?Brand=".$this->ID;
        }
    }
}
