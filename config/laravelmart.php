<?php 

///Needs to support 
///   Fixed values in fields
///   Foreign Key Support : Pick data from foreign table and insert here

return [


'test' => 'testcheckkey',


'tablename' => [

    "index" => [
                "fieldname" => [],
                "fieldname" => [],
                 
              ],
    "edit"  => [  ]

],

'products' =>   [
                    "fields" => [
                        ['code','Code:', 'text',[] ], 
                        ['name','Name:', 'text',[] ], 
                        ['stock','Stock:', 'text',[] ], 
                        ['mrp','MRP:', 'text',[] ], 
                        ['price','Price:', 'text',[] ], 
                        ['discount','Discount:', 'text',[] ],
                        ['category_id','Categories:', 'select' , [ "dynamic"=> "/category/list","multiple"=>""] ], 
                        ['image','Image:', 'text',[] ],
                        ['short_desc','Short Desc:', 'textarea',[] ],
                        ['long_desc','Long Desc:', 'textarea',["rows" => "50","style" => " height: 200px;"] ]
                    ],
                    "index" => ['code','name','mrp','image']
                ],
    

'categories' => [
                    "fields" => [
                        ['name','Name:', 'text',[] ], 
                        ['parent_id','Parent Category:', 'select' , [ "dynamic"=> "/category/list"] ],
                    ],
                    "index" => ['name','parent_id']
                ],

'orders' => [
                    "fields" => [
                        ['user_id','User id:', 'text',[] ], 
                        ['order_id','Order id:', 'text',[] ], 
                        ['coupon','Coupon:', 'text',[] ], 
                        ['discount','Discount:', 'text',[] ], 
                        
                    ],
                    "index" => ['user_id','order_id','coupon','discount']
                ],


'orderitems' => [
                    "fields" => [
                        ['order_id','Order id:', 'text',[] ], 
                        ['product_id','Product id:', 'text',[] ], 
                        ['quantity','quantity:', 'text',[] ], 
                        ['price','Discount:', 'text',[] ], 
                        
                    ],
                    "index" => ['order_id','product_id','quantity','price']
                ],


'menus' => [
                    "fields" => [
                        ['name','Name :', 'text',[] ], 
                        ['url','Url :', 'text',[] ], 
                        ['parent_id','Parent id:', 'text',[] ], 
                        
                    ],
                    "index" => ['name','url','parent_id']
                ],
                
                                                
'wishlists' => [
                    "fields" => [
                        ['product_code','Product Code:', 'text',[] ], 
                        ['user_id','User Id:', 'text',[] ],
                    ],
                    "index" => ['product_code','user_id']
                ],

'users' => [
                    "fields" => [
                        ['name','Name:', 'text',[] ], 
                        ['email','Email:', 'text',[] ], 
                        ['password','Password:', 'text',[] ], 
                        ['remember_token','Remember token:', 'text',[] ], 
                    ],
                    "index" => [ 'name', 'email' ]
                ],
                
                
                
                
'pages' => [
                    "fields" => [
                        ['title', 'Title' , 'text' , ['Placeholder' => 'Enter Title'] ], 
                        ['url', 'Url' , 'text' , ['Placeholder' => 'Enter Url'] ], 
                        ['status', 'Status' ,  'select' , [ "options"=> [ 'draft' => 'Draft','live' => 'Live'] ,"selected" => 'live' ] ],  
                        ['visibility', 'Visibility' ,  'select' , [ "options"=> [ 'public' => 'Public','private' => 'Private'] ,"selected" => 'public'] ], 
                        ['type', 'Type' , 'select' , [ "options"=> [ 'html' => 'Html','md' => 'Markdown'] ,"selected" => 'Html' ] ], 
                        ['body', 'Body' , 'textarea' , [] ], 
                        ['header', 'Header' , 'textarea' , [] ],
                        ['parent_id','Parent' , 'select' , [ "dynamic"=> "/page/list"] ], 
                    ],
                    "index" => [ 'title', 'url' ,'status', 'visibility','type', 'parent_id' ]
                ],
                
                
                
'billings' => [
                    "fields" => [
                         ['salutation','Salutation:', 'text',[] ], 
                         ['first_name','First name:', 'text',[] ], 
                         ['last_name','Last name:', 'text',[] ], 
                         ['user_id','User id:', 'text',[] ], 
                         ['company','Company:', 'text',[] ], 
                         ['city','City:', 'text',[] ], 
                         ['state','State:', 'text',[] ], 
                         ['zip','Zip:', 'text',[] ], 
                         ['address','Address:', 'text',[] ], 

                    ],
                    "index" => ['salutation','first_name','last_name','user_id','company','city','state','zip','address']
                ],
                
                
                
'roles' => [
                        "fields" => [
                            ['name','Name:', 'text',[] ], 
                            ['display_name','Display Name :', 'text',[] ],
                            ['description','Description Name :', 'text',[] ],
                        ],
                        "index" => ['name','display_name','description']
],


'settings' => [
                        "fields" => [
                            ['module','Module Name:', 'text',[] ], 
                            ['key','Setting Name :', 'text',[] ],
                            ['value','Setting Value :', 'text',[] ],
                            ['options','Default Values :', 'text',[] ],
                            ['comments','Comment :', 'text',[] ],
                        ],
                        "index" => ['module','key','value','options','comment']
],

'permissions' => [
                        "fields" => [
                            ['name','Name:', 'text',[] ], 
                            ['display_name','Display Name :', 'text',[] ],
                            ['description','Description :' , 'text',[] ],
                        ],
                        "index" => ['name','display_name','description']
],


'coupons' => [
                        "fields" => [
                            ['code','Code:', 'text',[] ], 
                            ['type','Type :', 'text',[] ],
                            ['amount','Amount :' , 'text',[] ],
                            ['from','From :' , 'text',[] ],
                            ['to','To :' , 'text',[] ],
                            ['can_club','Can Club :' , 'text',[] ],
                            ['usage','Usage :' , 'text',[] ],
                            ['order_minimum','Order Minimum :' , 'text',[] ],
                            ['order_maximum','Order Maximum :' , 'text',[] ],
                            ['products_included','Products Included :' , 'text',[] ],
                            ['categories_included','Categories Included :' , 'text',[] ],
                            ['categories_excluded','Categories Excluded :' , 'text',[] ],
                            ['payment_methods','Payment Methods :' , 'text',[] ],
                ],
                        "index" => ['code','type','amount','from','to','can_club','usage']
                    // 'order_minimum','order_maximum','products_included','products_excluded',
                    //    'categories_included', 'categories_excluded', 'payment_methods'      
],



];
