<?php namespace App\Services\Html;

use App\Services\Crud\CrudFactory;

class FormBuilder extends \Collective\Html\FormBuilder {
    
    public function selectfield($name, $value,$label,$selected,$options = array())
    {
        
        $errors = \Session::get('errors'); //print_r($errors);
        $error = '';
        if( !empty($errors)  && $errors->has($name))
        {
            $error = '<div class="text-danger desktop-3"><label class="error" for="' . $name . '">' . $errors->first($name) . '</label></div>' ;
        }
        
        return sprintf('<div class="row field"> %s %s %s</div>',
        parent::label($name, $label,  array_merge([ 'class' => 'desktop-3' ], $options) ),
        parent::select($name, $value, $selected,  array_merge([ 'class' => 'desktop-6' ], $options) ),
        $error
        );
        
    }
    
    public function textfield($name, $label,$type, $options = array())
    {
        
        $errors = \Session::get('errors'); //print_r($errors);
        $error = '';
        $class = '';
        if( !empty($errors)  && $errors->has($name))
        {
            $error = '<div class="text-danger desktop-3"><label class="error" for="' . $name . '">' . $errors->first($name) . '</label></div>' ;
            
            $class = ' message message-danger';
        }
        
        
        return sprintf('<div class="row field%s"> %s %s %s</div>',
        $class,
        parent::label($name, $label,  array_merge([ 'class' => 'desktop-3' ], $options) ),
        parent::$type($name, null,   array_merge([ 'class' => 'input desktop-6' ], $options) ),
        $error
        );
        
    }
    
    public function createform($fields,$form_data=[])
    {
        $output = '';
        
        
        $crud = new CrudFactory("TESTTable");
        $crud->test();
        
        
        foreach($fields as $field)
        {
            if($field[2] == "select")
            {
                //$name, $value,$label,$selected,$options = array()
                $value = [];
                $selected = "";
                
                if(!isset( $field[3]["options"]) && isset( $field[3]["dynamic"]) )
                {
                    //TODO
                    //Create array of these infos and later in the end of form run it
                    //It will save document ready and unnesary calls of selectize
                    
                    $data['id'] = $field[0];
                    $data['url'] = $field[3]["dynamic"];
                    $data['title'] = str_replace(":","",$field[1]);
                    
                    
                    $data['value'] = empty($form_data) ? '' : $form_data->$field[0];
                    //echo $field[0]." - ".parent::old($field[0]).parent::old('name');die;
                    $output.= \View::make('admin.components.select.select_dynamic',$data);
                    
                }
                else
                {
                    echo $field[0];
                    $value = $field[3]["options"];
                    $selected = $field[3]["selected"];
                    unset($field[3]["options"]);
                    unset($field[3]["selected"]);
                    
                    $data['id'] = $field[0];
                    $data['value'] = empty($form_data) ? $selected : $form_data->$field[0];;
                    //echo $field[0]." - ".parent::old($field[0]).parent::old('name');die;
                    $output.= \View::make('admin.components.select.select_static',$data);
                    
                }
                
                $output .= $this->selectfield( $field[0] , $value , $field[1], $selected , $field[3]);
            }
            else
            $output .= $this->textfield( $field[0] , $field[1] , $field[2], $field[3]);
        }
        
        return $output;
    }
    
    
    
    
}
