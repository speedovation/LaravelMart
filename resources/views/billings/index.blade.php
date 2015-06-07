@extends('layouts.main')

@section('content')

    <div class="row">

        @include('flash::message')

            <h1 class="float-left">Billings Addresses</h1>
<!--            <i class="float-left">Last created will be default address. Last used will be given priority.</i>-->
            
            <a class="button primary float-right" style="margin-top: 25px" href="{!! route('billings.create') !!}">Add New</a>

            
            
            @if($billings->isEmpty())
                <div class="well text-center">No billing address added yet.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Salutation</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Account Id</th>
			<th>Company</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			<th>Address</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($billings as $billing)
                        <tr>
                            <td>{!! $billing->salutation !!}</td>
					<td>{!! $billing->first_name !!}</td>
					<td>{!! $billing->last_name !!}</td>
					<td>{!! $billing->account_id !!}</td>
					<td>{!! $billing->company !!}</td>
					<td>{!! $billing->city !!}</td>
					<td>{!! $billing->state !!}</td>
					<td>{!! $billing->zip !!}</td>
					<td>{!! $billing->address !!}</td>
                            <td>
                                <a href="{!! route('billings.edit', [$billing->id]) !!}"><i class="i-edit"></i></a>
                                <a href="{!! route('billings.delete', [$billing->id]) !!}" 
                                onclick="return confirm('Are you sure wants to delete this Billing?')">
                                <i class="i-close"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
    </div>
@endsection
