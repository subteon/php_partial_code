<?php
/************

////////////////////////////
PHP Short Open Tag Replace
////////////////////////////

$ php -d short_open_tag=1 short_open_tag_replace.php

Fork Source Code
URL: http://sasezaki.hatenablog.com/entry/2014/02/13/233631

************/

mb_internal_encoding("UTF-8");

$dir = 'path/to/';
$files = scandir($dir);

$php_files = array();
foreach($files as $v){
	if( strpos($v, '.php') !== false ){
		$php_files[] = $v;
	}
}
unset($v);

foreach($php_files as $v){

	$source_1 = $v;
	$source = file_get_contents($dir . $source_1);
	$tokens = token_get_all($source);
	$new_source = '';

	foreach($tokens as &$token) {
	    if (is_array($token) && $token[0] === T_OPEN_TAG) {
	        $new_source .= '<?php ';
	    }else{
	    	$token_str = '';
	    	if( is_array($token) ){
	    		$token_str = $token[1];
	    	}else{
	    		$token_str = $token;
	    	}
	        $new_source .= $token_str;
	    }
	}

	$new_source = str_replace('<?=', '<?php echo ', $new_source);
	$new_source = str_replace('<? =', '<?php echo ', $new_source);
	$new_source = str_replace('<?php=', '<?php echo ', $new_source);
	$new_source = str_replace('<?php =', '<?php echo ', $new_source);

	$new_source = str_replace('<?php  ', '<?php ', $new_source);

	$file = $dir . $source_1;

	$handle = fopen($file, "w");
	fwrite($handle, $new_source);
	fclose($handle);

	echo($source_1 . ' done.' . "\n");

}
unset($v);

exit();
