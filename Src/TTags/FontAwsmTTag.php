<?php

/**
 * Description of FontAwsmTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class FontAwsmTTag extends TapvirTagContainer{

	function __construct($ico, $size = '1x', $additionalClass = null,$decorative = true,$class = 'fa'){

		$attribute = $class.' fa-'.$ico;

		if($size != '1x'){
			$attribute .= ' fa-'.$size;
		}

		$setClass = ' class = "'.$attribute;

		if($additionalClass !== null){
			$setClass .= ' '.$additionalClass;
		}

		$setClass .= '"';

		if($decorative){
			$setClass .= '  aria-hidden="true"';
		}

		parent::__construct('i', $setClass);
	}

};