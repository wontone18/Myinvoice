<?php

/**
 * 
 * Template class
 */

require ('define/page-level-js.php');
require ('define/page-level-css.php');

class template{

	function loadjs($action){

		if(defined("js-".$action)){
			/// use explode to break 
			$jslist="";
			$jss=explode(",",constant("js-".$action));
			for ($js = 0; $js < sizeof($jss); $js++) {
				$jslist.='<script  src="'.$jss[$js].'" type="text/javascript"> </script>';

			
		}
		return $jslist;
	}



	}


	function loadcss($action){

			if(defined("css-".$action)){
			// explode 
			$csslist="";
			$css=explode(",",constant("css-".$action));
			for ($cs = 0; $cs < sizeof($css); $cs++) {
				$csslist.='<link href="'.$css[$cs].'" rel="stylesheet" type="text/css" />';
			}
			
			return $csslist;
		}


	}

}