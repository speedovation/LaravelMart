@extends('layouts.main')

@section('content')

    <div class="row">


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
            
            <a class="button primary" style="margin-top: 25px" href="{!! route('admin.index','users') !!}">Manage users</a>
            <a class="button primary" style="margin-top: 25px" href="{!! route('admin.index','billings') !!}">Manage billings</a>

            <a class="button primary" style="margin-top: 25px" href="{!! route('admin.index','categories') !!}">Manage categories</a>
            <a class="button primary" style="margin-top: 25px" href="{!! route('admin.index','products') !!}">Manage products</a>
            <a class="button primary" style="margin-top: 25px" href="{!! route('admin.index','orders') !!}">Manage orders</a>
            
            <a class="button primary" style="margin-top: 25px" href="{!! route('admin.index','password_resets') !!}">Manage password_resets</a>
            
            <a class="button primary" style="margin-top: 25px" href="{!! route('admin.index','wishlists') !!}">Manage wishlists</a>
            <p>&nbsp;</p>
            
           
    </div>
@endsection
