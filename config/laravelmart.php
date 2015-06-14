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
                        ['category_id','Category Id:', 'text',[] ],
                        ['image','Image:', 'text',[] ],
                        ['short_desc','Short Desc:', 'text',[] ],
                        ['long_desc','Long Desc:', 'text',[] ]
                    ],
                    "index" => ['code','name','mrp','image']
                ],
    

'categories' => [
                    "fields" => [
                        ['name','Name:', 'text',[] ], 
                        ['parent_id','Parent Id:', 'text',[] ],
                    ],
                    "index" => ['name','parent_id']
                ],

'orders' => [
                    "fields" => [
                        ['user_id','User id:', 'text',[] ], 
                        
                    ],
                    "index" => ['user_id']
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
                        ['title', 'Title' , 'text' , [] ], 
                        ['url', 'Url' , 'text' , [] ], 
                        ['status', 'Status' , 'text' , [] ], 
                        ['visibility', 'Visibility' , 'text' , [] ], 
                        ['type', 'Type' , 'select' , [ "options"=> [ 'html' => 'Html','md' => 'Markdown'] ,"selected" => 'Html' ] ], 
                        ['body', 'Body' , 'text' , [] ], 
                        ['header', 'Header' , 'text' , [] ],
                        ['parent_id','Parent id' , 'text' , [] ],
                    ],
                    "index" => [ 'title', 'url' ,'status', 'visibility','type', 'body', 'header', 'parent_id' ]
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

];
