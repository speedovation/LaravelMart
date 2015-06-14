
<fieldset>
    <legend>Identity</legend>
        
    <?php
    
    $salutations_arr = [ 
               'Dr' => 'Dr', 
               'Mr' => 'Mr',
               'Mrs' => 'Mrs',
               'Miss' => 'Miss',
           ];
    
    $fields = [
       
        ['first_name','First Name:', 'text',[] ],  
        ['last_name','Last Name:','text', [] ],  
        ['company','Company:','text', [] ],  
    ];
      
 ?>
    
   {!! Form::selectfield('salutation', $salutations_arr , 'Salutation', 'Mr') !!} 
   {!! Form::createform($fields)!!} 
    
        
</fieldset>

<fieldset>
    <legend>Address</legend>
    
     <?php
    
    $fields = [
        ['address','address:','textarea', [] ],  
        ['city','City:','text', [] ],
        ['state','State:', 'text',[] ],  
        ['zip','Zip:', 'text',[] ],  
    ];
      
 ?>
    {!! Form::createform($fields)!!} 
    
    {!! Form::hidden('user_id', Auth::user()->id )!!} 
    
    
</fieldset>

<!--- Submit Field --->
    <div class="field space-top">
         <div class="desktop-3">&nbsp;</div>
         <div class="desktop-9">
            {!! Form::submit('Save', ['class' => 'button primary large']) !!}
            {!! Form::reset('Reset', ['class' => 'button large']) !!}
         </div>
    </div>
