@extends('layouts.main')

@section('content')

    <div class="row">

        @include('flash::message')

        <div class="row">
            <h1 class="desktop-4">Products</h1>
            <a class="desktop-8 button primary" style="margin-top: 10px" href="{!! route('manageproducts.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($products->isEmpty())
                <div class="well text-center">No Products found.</div>
            @else
                <table class="table zebra bordered rounded">
                    <thead>
                    <th>Code</th>
			<th>Name</th>
			<th>Stock</th>
			<th>Mrp</th>
			<th>Price</th>
			<th>Discount</th>
			<th>Category Id</th>
			<th>Image</th>
	
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                  
                    @foreach($products as $product)
                        <tr>
                            <td>{!! $product->code !!}</td>
					<td>{!! $product->name !!}</td>
					<td>{!! $product->stock !!}</td>
					<td>{!! $product->mrp !!}</td>
					<td>{!! $product->price !!}</td>
					<td>{!! $product->discount !!}</td>
					<td>{!! $product->category_id !!}</td>
					<td>{!! $product->image !!}</td>
					               <td>
                                <a href="{!! route('manageproducts.edit', [$product->id]) !!}"><i class="i-edit"></i></a>
                                <a href="{!! route('manageproducts.delete', [$product->id]) !!}" 
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
