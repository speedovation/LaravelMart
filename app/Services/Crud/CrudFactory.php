<?php namespace App\Services\Crud;

use App\Services\Crud\Select;

class CrudFactory  {
    
	private $tablename;
	
    function __construct($tablename) {
    		$this->tablename = $tablename;	
    }
	
	
	function test()
	{
		echo $this->tablename."NSSS";
	}
    
	function addText($name,$label,$options)
	{
		
	}
    
    function addSelect(Select $select)
	{
		
	}
    
    
    
}
