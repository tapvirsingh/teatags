<?php

class FontAwsmTTag extends TapvirTagContainer{

	function __construct($ico, $size = 1){

		$attribute = 'fa fa-'.$ico;

		if($size > 1){
			$attribute .= ' fa-'.$size;
		}


		parent::__construct('i', $attribute);
	}

};