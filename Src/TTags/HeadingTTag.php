<?php

/**
 * Description of HeadingTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainer;


class HeadingTTag extends TapvirTagContainer{

	function __construct($tag,$textOrHtml,$class = null,$addAttrib = null) {

		$textOrHtml = ttag_getData($textOrHtml);

		$attribute = null;

		if($class !== null){
			$attribute = 'class="'.$class.'"';
		}

		if($addAttrib !== null){
			$attribute .= ' '.$addAttrib;
		}

        parent::__construct($tag, $attribute, $textOrHtml);
    }

}