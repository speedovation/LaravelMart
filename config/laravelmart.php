<?php return [
    'test' => 'testfun',
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
                        ['name','Name:', 'text',[] ], 
                        ['parent_id','Parent Id:', 'text',[] ],
                    ],
                    "index" => ['name','parent_id']
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
