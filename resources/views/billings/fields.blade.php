<!--- Salutation Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('salutation', 'Salutation:') !!}
    {!! Form::text('salutation', null, ['class' => 'form-control']) !!}
</div>

<!--- First Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Last Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!--- Account Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('account_id', 'Account Id:') !!}
    {!! Form::text('account_id', null, ['class' => 'form-control']) !!}
</div>

<!--- Company Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('company', 'Company:') !!}
    {!! Form::text('company', null, ['class' => 'form-control']) !!}
</div>

<!--- City Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!--- State Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!--- Zip Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('zip', 'Zip:') !!}
    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
</div>

<!--- Address Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
