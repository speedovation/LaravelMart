<?php namespace App\Services\Html;

class FormBuilder extends \Collective\Html\FormBuilder {

	/*public function submit($value = null, $options = [])
	{
		return sprintf('
			<div class="field %s">
				%s
			</div>',
			empty($options) ? '' : $options[0],
			parent::submit($value, ['class' => 'button primary'])
		);
	}

	public function destroy($text, $message, $class = null)
	{
		return parent::submit($text, ['class' => 'button button-danger ' . ($class? $class:''), 'onclick' => 'return confirm(\'' . $message . '\')']);
	}

	public function control($type, $colonnes, $nom, $errors, $label = null, $valeur = null, $pop = null, $placeholder = '')
	{
		$attributes = ['class' => 'input', 'placeholder' => $placeholder];
		return sprintf('
			<div class="field %s %s">
			  %s
			  %s
				%s
				%s
			</div>',
			($colonnes == 0)? '': 'desktop-' . $colonnes,
			$errors->has($nom) ? 'has-error' : '',
			$label ? $this->label($nom, $label, ['class' => 'control-label']) : '',
			$pop? '<a href="#" tabindex="0" class="badge float-right" data-toggle="popover" data-trigger="focus" title="' . $pop[0] .'" data-content="' . $pop[1] . '"><span>?</span></a>' : '',
			call_user_func_array(['Form', $type], ($type == 'password')? [$nom, $attributes] : [$nom, $valeur, $attributes]),
			$errors->first($nom, '<small class="help-block">:message</small>')
		);
	}

	public function check($name, $label)
	{
		return sprintf('
			<div class="desktop-12">
				<label>
			  	%s%s
			  </label>
			</div>',
			parent::checkbox($name),
			$label
		);		
	}

	public function selection($nom, $list = [], $selected = null, $label = null)
	{
		return sprintf('
			<div class="field" style="width:200px;">
				%s
			  %s
			</div>',
			$label ? $this->label($nom, $label, ['class' => 'desktop-3']) : '',
			parent::select($nom, $list, $selected, ['class' => 'input desktop-9'])
		);
	}
	*/
	
	
/*Form::macro('errorMsg', function($field){//yay! we don't have to pass $errors anymore
    $errors = Session::get('errors');

    if($errors && $errors->has($field)){//make sure $errors is not null
        $msg = $errors->first($field);
        return "<span class=\"error\">$msg</span>";
    }
    return '';
});*/


public function selectfield($name, $value,$label,$selected,$options = array())
    {
        
		$errors = \Session::get('errors'); //print_r($errors); 
		$error = '';
		if( !empty($errors)  && $errors->has($name))
		{ 
			$error = '<div class="text-danger desktop-3"><label class="error" for="' . $name . '">' . $errors->first($name) . '</label></div>' ;       
		}
		
		return sprintf('<div class="field"> %s %s %s</div>',
           parent::label($name, $label,  array_merge([ 'class' => 'desktop-3' ], $options) ),
           parent::select($name, $value, $selected,  array_merge([ 'class' => 'input desktop-6' ], $options) ),
		   $error
		);
		

       /* return sprintf(
            '<div class="form-group">%s<div%s>%s%s</div></div><!-- end form-group -->',
            parent::label($name, $label, $labelOptions),
            $errors->has($name) ? ' class="error-control"' : '',
            parent::text($name, null, $inputOptions),
            $errors->has($name) ? '<span class="error"><label class="error" for="' . $name . '">' . $errors->first($name) . '</label></span>' : ''
        );
		*/
		
    }

	public function textfield($name, $label,$type, $options = array())
    {
        
		$errors = \Session::get('errors'); //print_r($errors); 
		$error = '';
		if( !empty($errors)  && $errors->has($name))
		{ 
			$error = '<div class="text-danger desktop-3"><label class="error" for="' . $name . '">' . $errors->first($name) . '</label></div>' ;       
		}
		
		return sprintf('<div class="field"> %s %s %s</div>',
           parent::label($name, $label,  array_merge([ 'class' => 'desktop-3' ], $options) ),
           parent::$type($name, null,   array_merge([ 'class' => 'input desktop-6' ], $options) ),
		   $error
		);
		

       /* return sprintf(
            '<div class="form-group">%s<div%s>%s%s</div></div><!-- end form-group -->',
            parent::label($name, $label, $labelOptions),
            $errors->has($name) ? ' class="error-control"' : '',
            parent::text($name, null, $inputOptions),
            $errors->has($name) ? '<span class="error"><label class="error" for="' . $name . '">' . $errors->first($name) . '</label></span>' : ''
        );
		*/
		
    }
	
	public function createform($fields)
	{
		$output = '';
		
		foreach($fields as $field)
		{
			if($field[2] == "select")
			{
				//$name, $value,$label,$selected,$options = array()
							
				$value = $field[3]["options"]; 
				print_r($value);
				unset($field[3]["options"]);
				$output .= $this->selectfield( $field[0] , $value , $field[1], $field[3]["selected"] , $field[3]);
			}
			else
				$output .= $this->textfield( $field[0] , $field[1] , $field[2], $field[3]);
		}
		
		return $output;
	}
	
	
	

}
