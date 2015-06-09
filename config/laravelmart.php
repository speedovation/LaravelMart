<?php return [
    'test' => 'testfun',
 'tablename' => [

    "index" => [
                "fieldname" => [type],
                "fieldname" => [type],
                 
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

                ]

];
