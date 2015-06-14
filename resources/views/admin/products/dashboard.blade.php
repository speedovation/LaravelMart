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
    <a class="button primary"  href="{!! route('admin.index','menus') !!}">Manage Menus</a>
    <a class="button primary"  href="{!! route('admin.index','pages') !!}">Manage Pages</a>
    
    
    <a class="button primary" href="{!! route('admin.index','users') !!}">Manage Users</a>
    <a class="button primary" href="{!! route('admin.index','billings') !!}">Manage Billings</a>
    
    <a class="button primary" href="{!! route('admin.index','categories') !!}">Manage Categories</a>
    <a class="button primary" href="{!! route('admin.index','products') !!}">Manage Products</a>
    <a class="button primary" href="{!! route('admin.index','orders') !!}">Manage Orders</a>
    <a class="button primary" href="{!! route('admin.index','orderitems') !!}">Manage Order Items</a>
    
    <a class="button primary" href="{!! route('admin.index','password_resets') !!}">Manage Password Resets</a>
    
    <a class="button primary" href="{!! route('admin.index','wishlists') !!}">Manage Wishlists</a>
    
    <p>&nbsp;</p>
    
    
</div>
@endsection
