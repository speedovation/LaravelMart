<?php

    // My common functions
    function limit_words($content,$length)
    {
    	
    		$pos=strpos($content, ' ', $length);
		
		$html = substr($content,0,$pos );
		
		//$html = clean_div($html);
			//return "mAYon";
    		return ( closetags($html))."..."; 
    	
    }
    function clean_div($content)
    {
    		return str_replace('div','p', $content );
    }

    // close opened html tags
    function closetags ( $html )
    {
        preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
        $openedtags = $result[1];
        preg_match_all('#</([a-z]+)>#iU', $html, $result);
        $closedtags = $result[1];
        $len_opened = count($openedtags);
        if (count($closedtags) == $len_opened) {
            return $html;
        }
        $openedtags = array_reverse($openedtags);
        for ($i=0; $i < $len_opened; $i++) {
            if (!in_array($openedtags[$i], $closedtags)) {
                $html .= '</'.$openedtags[$i].'>';
            } else {
                unset($closedtags[array_search($openedtags[$i], $closedtags)]);
            }
        }
        return $html;
    }

?>
