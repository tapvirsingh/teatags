<?php

/**
 * Description of DivTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainers\DivTapvirTagContainer;


class DivTTag extends DivTapvirTagContainer{
    
	protected $dataToAppend;

    function __construct($class ,$dataToAppend,$extraAttribute = null) {

    	$this->dataToAppend = ttag_getData($dataToAppend);

    	$attribute = null;

    	if($class !== null){
	    	$attribute = 'class = "'.$class.'"';
	    	// $attribute .= '"';
    	}

    	if($extraAttribute !== null){
    		$attribute .= ' '.$extraAttribute;
    	}

        parent::__construct($attribute, $this->dataToAppend);
    }

}