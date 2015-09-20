<?php

// My common functions

function limit_words($content,$length)
{
	
	$pos=strpos($content, ' ', $length);
	
	return substr($content,0,$pos )."..."; 
	
}
function clean_div($content)
{
	return str_replace('div','p', $content );
	
}


?>
