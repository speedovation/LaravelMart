@extends('layouts.main')

@section('content')

    <div class="row">

        @include('flash::message')

        <div class="row">
            <h1 class="desktop-4">{!! ucfirst( str_singular($table) )  !!}</h1>
            <a class="desktop-8 button primary" style="margin-top: 10px" href="{!! route('admin.create',[$table]) !!}">Add New</a>
        </div>

        <div class="row">
            @if($products->isEmpty())
                <div class="well text-center">No Products found.</div>
            @else
                <table class="table zebra bordered rounded">
                    <thead>
                    
                    @foreach($fields as $field)
                        <th>{!! $field !!}</th>
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
                                <a href="{!! route('admin.edit', [$table, $product->id]) !!}"><i class="i-edit"></i></a>
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
