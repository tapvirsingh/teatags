<?php

/**
 * Description of FontAwsmTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class FontAwsmTTag extends TapvirTagContainer{

	function __construct($ico, $size = 1){

		$attribute = 'fa fa-'.$ico;

		if($size > 1){
			$attribute .= ' fa-'.$size;
		}

		$class = ' class = "'.$attribute.'"';

		parent::__construct('i', $class);
	}

};