<?php

/**
 * Description of DivTapvirTagContainer
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainer;

class PageHeadingTTag extends TapvirTagContainer{

	function __construct($textOrHtml,$class = null) {

		if($class !== null){
			$class = 'class="'.$class.'"';
		}

        parent::__construct('h1', $class, $textOrHtml);
    }

}