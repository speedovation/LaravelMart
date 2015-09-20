
{!! Form::createform($fields,$data)!!} 

{!! Form::hidden('page',$page) !!}
<!--- Submit Field --->

<div class="row">
<div class="desktop-3">&nbsp;</div>
<div class="desktop-9">
    {!! Form::submit('Save Data', ['class' => 'button button-royal']) !!}
    {!! Form::reset('Reset Data', ['class' => 'button']) !!}
</div>
</div>

<div><p>&nbsp;</p></div>
