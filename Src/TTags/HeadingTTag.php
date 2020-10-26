<?php

/**
 * Description of HeadingTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainer;


class HeadingTTag extends TapvirTagContainer{

	function __construct($tag,$textOrHtml,$class = null) {

		$textOrHtml = ttag_getData($textOrHtml);

		if($class !== null){
			$class = 'class="'.$class.'"';
		}

        parent::__construct($tag, $class, $textOrHtml);
    }

}