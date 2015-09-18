<?php
    
    $pages = [  'menus','pages', 'blogs', 'users','categories', 'products' ,
    'orders' , 'orderitems' ,'password_resets',
    'billings', 'wishlists' , 'roles' ,'permissions',
    'permission_role','role_user',
    'coupons', 'emails', 'settings'
    
    ];
    
?>

<ul class="link-list">
<!--            <li><span>Menus</span></li>-->
            @foreach($pages as $page)
            <li>
                <a class="<?php echo Request::segment(2) == $page ? 'active':''?>"  href="{!! route('admin.index',$page) !!}">Manage {!! str_replace( "_" ," ", ucfirst($page) ) !!}</a>
            </li>
            @endforeach
        </ul>


<!--        strtoupper    <i class="float-left">Last created will be default address. Last used will be given priority.</i>


billings        |
| categories      |
| migrations      |
| orderitems      |
| orders          |
| password_resets |
| permission_role |
| permissions     |
| products        |
| role_user       |
| roles           |
| sessions        |
| tokens          |
| users           |
| wishlists 


    -->
