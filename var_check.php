<?php
	function getTypeCheck($getchk){
		if(preg_match("/^[0-9,a-z,A-Z,_]+$/", $getchk) || $getchk == ""){
			return $getchk;
		}else{
			exit('Errer');
		}
	}
?>