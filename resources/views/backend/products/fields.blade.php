<!--- Code Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'input']) !!}
</div>


<!--- Name Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'input']) !!}
</div>


<!--- Stock Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::text('stock', null, ['class' => 'input']) !!}
</div>


<!--- Mrp Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('mrp', 'Mrp:') !!}
    {!! Form::text('mrp', null, ['class' => 'input']) !!}
</div>


<!--- Price Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'input']) !!}
</div>


<!--- Discount Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('discount', 'Discount:') !!}
    {!! Form::text('discount', null, ['class' => 'input']) !!}
</div>


<!--- Category Id Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::text('category_id', null, ['class' => 'input']) !!}
</div>


<!--- Image Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'input']) !!}
</div>


<!--- Short Desc Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('short_desc', 'Short Desc:') !!}
    {!! Form::text('short_desc', null, ['class' => 'input']) !!}
</div>


<!--- Long Desc Field --->
<div class="desktop-12 tablet-12 mobile-12">
    {!! Form::label('long_desc', 'Long Desc:') !!}
    {!! Form::text('long_desc', null, ['class' => 'input']) !!}
</div>



<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
