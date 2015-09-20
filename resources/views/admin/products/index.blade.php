@extends('admin.admin')

@section('content')

    <div class="row">

        @include('flash::message')

        <div class="row space-bottom">
            
            <div class="desktop-6">
                <h1 class="">{!! ucfirst($table)  !!}</h1>
            </div>
            
            <div class="desktop-6 text-right">
                <a class="button button-royal" style="margin-top: 10px" href="{!! route('admin.create',[$table,"page=$page"]) !!}">Add New {!! ucfirst( str_singular($table) )  !!}</a>
                <a class="button button-inverse" style="margin-top: 10px" href="{!! route('admin.dashboard') !!}">Back to Dashboard</a>
            </div>
        
        </div>

        <div class="row space-top">
            @if($products->isEmpty())
                <div class="well text-center">No Products found.</div>
            @else
                <table class="table zebra bordered rounded">
                    <thead>
                    
                    @foreach($fields as $field)
                        <th>{!! ucfirst($field) !!}</th>
                    @endforeach
                    
	
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                  
                    @foreach($products as $product)
                        <tr>
                        
                           @foreach($fields as $field)
                                <td>{!! $product->$field !!}</td>
					              @endforeach
                              
                           <td>
                                <a href="{!! route('admin.edit', [$table, $product->id, "page=$page"]) !!}">
                                <i class="i-edit"></i></a>
                                <a href="{!! route('admin.delete', [$table, $product->id]) !!}" 
                                onclick="return confirm('Are you sure wants to delete this Product?')">
                                <i class="i-close"></i></a>
                            </td>
                        
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                
                {!! $products->render() !!} 
                
            @endif
        </div>
    </div>
    

@endsection
