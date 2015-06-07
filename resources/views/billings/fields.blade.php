
<fieldset>
    <legend>Identity</legend>
        
    <?php
    
    $fields = [
        ['salutation','Salutation:', [] ],
        ['first_name','First Name:', [] ],  
        ['last_name','Last Name:', [] ],  
        ['company','Company:', [] ],  
    ];
      
 ?>
    
    
   {!! Form::createform($fields)!!} 
    
        
</fieldset>

<fieldset>
    <legend>Address</legend>
    
     <?php
    
    $fields = [
        ['address','address:', [] ],  
        ['city','City:', [] ],
        ['state','State:', [] ],  
        ['zip','Zip:', [] ],  
    ];
      
 ?>
    {!! Form::createform($fields)!!} 
    
    {!! Form::hidden('account_id', Auth::user()->id )!!} 
    
    
</fieldset>

<!--- Submit Field --->
    <div class="field space-top">
         <div class="desktop-3">&nbsp;</div>
         <div class="desktop-9">
            {!! Form::submit('Save', ['class' => 'button primary large']) !!}
            {!! Form::reset('Reset', ['class' => 'button large']) !!}
         </div>
    </div>
