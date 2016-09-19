<?php

class ProductBrandAdmin extends ModelAdmin
{
    public static $managed_models = array(
        'ProductBrand'
    );
    
    public static $url_segment = 'brands';
    public static $menu_title = 'Brands';
}
