<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;


class SettingTableSeeder extends DatabaseSeeder {

    public function run() {
        
        $faker = $this->getFaker();
        
        
        $settings = [ 
       
            "Region" => [
                "Base Country" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Currency" => [ "India", "Any country" ,"Provide valid country name"  ],
            ],

            "Invoicing"  =>
            [
                "Company Name" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Tax Registration Number" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Address Line1" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Address Line2" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Company Phone" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Company Email" => [ "India", "Any country" ,"Provide valid country name"  ],
            ],
            
            "Permalinks"  =>  [
            
                "Prepend shop categories and tags with base page"  => [ "India", "Any country" ,"Provide valid country name"  ],
                "Prepend product permalinks with shop base page"  => [ "India", "Any country" ,"Provide valid country name"  ],
                "Prepend product permalinks with product category" => [ "India", "Any country" ,"Provide valid country name"  ],
            
            ],
            
            "General Options" => [
            
                "Cart shows 'Return to Shop' button" => [ "India", "Any country" ,"Provide valid country name"  ],
                "After adding product to cart" => [ "India", "Say on the same page|Redirect to Checkout|Redirect to Cart" ,"Provide valid country name"  ],
                "Cart status after login" => [ "India", "Load current|Loaded Saved|Merge and load Current cart always will be loaded if customer logs in checkout page.","Provide valid country name"  ],
                "Reset pending Orders" => [ "India", "Change all 'Pending' Orders older than one month to 'On Hold'" ,"Provide valid country name"  ],
                "Complete processing Orders" => [ "India", "Any country" ,"Change all 'Processing' Orders older than one month to 'Completed'"  ],
                "Enforce login for downloads" => [ "India", "Any country" ,"Provide valid country name"  ],
            ],

            "Email Details" => [
            
                "Email address" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Email from name" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Email footer" => [ "India", "Any country" ,"Provide valid country name"  ],
            ],

            "Checkout page" => [
            
                "Validate postal/zip codes" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Show verify information message" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Show EU VAT reduction message" => [ "", "" , "This will only apply to EU Union based Shops."  ],
                "Allow guest purchases" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Show login form" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Allow registration" => [ "India", "Any country" ,"Provide valid country name"  ],
                "Force SSL on checkout" => [ "India", "Any country" ,"Provide valid country name"  ],
            ],
            
            "Integration" => [
               " Google Analytics ID" => [ "India", "Any country" ,"Log into your Google Analytics account to find your ID. e.g. UA-XXXXXXX-X"  ],
                "Enable eCommerce Tracking" => [ "India", "Any country" ,"Learn how to enable eCommerce tracking for your Google Analytics account."  ],
            ],
            
            
            "Catalog Options" => [
            
                "Catalog product buttons show" => [ "India", "Add to Cart|View Product|No Button" ,"Provide valid country name"  ],
                "Sort products in catalog by" => [ "India", "Creation Date|Product Title|Product Post Order" ,"Provide valid country name"  ],
                "Catalog sort direction" =>  [ "India", "Ascending|Descending" ,"Provide valid country name"  ],
                "Catalog products per row" => [ "3", "" ,"Provide Any integer value"  ],
                "Catalog products per page" => [ "India", "Any country" ,"Provide valid country name"  ],
            ],
            
            
            "Pricing Options" => [
                "Show prices with tax" => [ "India", "Any country" ,"This controls the display of the product price in cart and checkout page.",  ],
                "Currency display" => [ "India", "Any country" , "This controls the display of the currency symbol and currency code.", ],
                "Thousand separator" => [ "India", "Any country" , "This sets the thousand separator of displayed prices."  ],
                "Decimal separator" => [ "India", "Any country" , "This sets the decimal separator of displayed prices."  ],
                "Number of decimals" => [ "India", "Any country" , "This sets the number of decimal points shown in displayed prices." ],
            ],
            
            
            "Product Options" => [
                "Enable SKU- Stock keeping Unit field" => [ "Yes", "Yes|No", "Leave blank for No."],
                "Enable weight field" => [ "No", "Yes|No", "Leave blank for none."],
                "Weight Unit" => [ "", "Kilograms|Pounds", ""],
                "Enable product dimensions" => [ "", "Yes|No", "Leave blank for No."],
                "Dimensions Unit" => [ "", "centimeters|inches", ""],
                "Product thumbnail images per row" =>[ "3", "", ""],
                "Show related products" => [ "Yes", "Yes|No", "Leave blank for No."],
            ],
            
            "Shipping Options" => [
                "Enable Shipping" => [ "Yes", "Yes|No", "Only turn this off if you are not shipping items, or items have shipping costs included."],
                "Enable shipping calculator on cart" => [ "Yes", "Yes|No", "" ],
                "Only ship to billing address" => [ "Yes", "Yes|No", "" ],
                "Checkout always shows Shipping fields" => [ "Yes", "Yes|No", "This will have no effect if 'Only ship to billing address' is activated."]
            ],
            
            
            "Cropping Options" => [

                "Crop Tiny images"=> [ "Yes", "Yes|No", "" ],
                "Crop Thumbnail images"=> [ "Yes", "Yes|No", "" ],
                "Crop Catalog images"=> [ "Yes", "Yes|No", "" ],
                "Crop Large images"=> [ "Yes", "Yes|No", "" ],
            ],
            
            
            "Image Sizes" => [
            
                "Tiny Image Width" => [ "36px", "", "Valid  size with unit like 36px, 2rem etc" ],
                "Tiny Image Height" => [ "36px", "", "Valid  size with unit like 36px, 2rem etc" ],
            
                "Thumbnail Image Width" => [ "90px", "", "Valid  size with unit like 36px, 2rem etc" ],
                "Thumbnail Image Height" => [ "90px", "", "Valid  size with unit like 36px, 2rem etc" ],
            
                "Catalog Image Width" => [ "150px", "", "Valid  size with unit like 36px, 2rem etc" ],
                "Catalog Image Height" => [ "150px", "", "Valid  size with unit like 36px, 2rem etc" ],
            
                "Large Image Width" => [ "300px", "", "Valid  size with unit like 36px, 2rem etc" ],
                "Large Image Height" => [ "300px", "", "Valid  size with unit like 36px, 2rem etc" ],
            
               ],
            
            
            

       ];
        

        foreach($settings as $moduleName => $moduleSettings )
        {
            
            foreach($moduleSettings as $key => $value)
            {
                 Setting::create([
                    "module" => $moduleName,
                    "key"  => $key,
                    "value"  => $value[0],
                    "options" =>$value[1] ,
                    "comment" => $value[2]
                    ]);
            }
        }


    }

}
