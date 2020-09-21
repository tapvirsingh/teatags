<?php

/**
 * Description of DivTapvirTagContainer
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainer;

class ParaTTag extends TapvirTagContainer{
    
    function __construct($textOrHtml,$class =null,$extraAttribute = null) {

    	$attribute = null;

    	if($class !== null){
    		$attribute = 'class="'.$class.'"';
    	}

    	if($extraAttribute !== null){
    		$attribute .= ' '.$extraAttribute;
    	}

        parent::__construct('p', $attribute, $textOrHtml);
    }

}