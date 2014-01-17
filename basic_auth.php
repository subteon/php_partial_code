<?php

	// php simple basic auth
	// use crypt.
	// example id:foo password:test
	
	/*
	user id and password does not describe the code on the original.
	you should ensure you have run on the command in advance.
	->
	-------------
	php echo( crypt('foo', 'WY0pDkw5MByHR10Yae') );
	php echo( crypt('test', 'x5YcATNzZUTtAG9ubp') );
	-------------
	*/
	//

	$sample_array = array();
	
	$sample_array['user'] = 'foo';
	$sample_array['password'] = 'test';
	
	$sample_array['salt_user'] = 'WY0pDkw5MByHR10Yae';
	$sample_array['salt_password'] = 'x5YcATNzZUTtAG9ubp';
	
	//salt -> use crypt.
	$sample_array['hashed_user'] = crypt( $sample_array['user'], $sample_array['salt_user'] );
	$sample_array['hashed_password'] = crypt( $sample_array['password'], $sample_array['salt_password'] );

	basic_auth( $sample_array );

	/* -------------------- */
	
    function basic_auth( $auth_array ){
        
        if( isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'] )){
            if( crypt( $_SERVER['PHP_AUTH_USER'], $auth_array['salt_user'] ) === $sample_array['hashed_user'] && crypt( $_SERVER['PHP_AUTH_PW'], $sample_array['salt_password'] ) === $sample_array['hashed_password'] ){
                return;
            }
        }
        
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        header('HTTP/1.0 401 Unauthorized');
        header('Content-type: text/html; charset='.mb_internal_encoding());
        die("Authorization Failed.");
    }
	
?>
