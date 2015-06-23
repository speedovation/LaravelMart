@extends('admin.admin')

@section('content')

<div class="row dashboard">
    
    
    <h1>Dashboard</h1>
<!--            <i class="float-left">Last created will be default address. Last used will be given priority.</i>


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
	
	
	<?php
	
	$pages = [  'menus','pages','users','categories', 'products' ,
				'orders' , 'orderitems' ,'password_resets',
				'billings', 'wishlists' , 'roles' ,'permissions',
				'permission_role','role_user',
				'coupons', 'emails', 'settings'
				
				 ];
	
	?>
	
	
	@foreach($pages as $page)
    <a class="button primary"  href="{!! route('admin.index',$page) !!}">MANAGE {!! str_replace( "_" ," ", strtoupper($page) ) !!}</a>
    @endforeach
    
    
    <p>&nbsp;</p>
    
    
</div>
@endsection
