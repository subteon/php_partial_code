<?php

	fb_2();

	/* -------------------- */
	
	function fb_1(){
		//array_map( function($i){ echo($i%15?$i%3?$i%5?$i:"Buzz":"Fizz":"FizzBuzz")."\n"; },range(1,100) );
		for($i=0;$i<100;$i++){
			echo($i%15?$i%3?$i%5?$i:"Buzz":"Fizz":"FizzBuzz")."\n";
		}
	}
	
	
?>
