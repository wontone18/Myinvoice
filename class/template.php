<?php

/**
 * 
 * Template class
 */

require ('define/page-level-js.php');
require ('define/page-level-css.php');

class template{

	function loadjs($action){

		if(defined($action)){
			return constant("js-".$action);
		}



	}


	function loadcss($action){

		if(defined($action)){
			return constant("css-".$action);
		}


	}

}