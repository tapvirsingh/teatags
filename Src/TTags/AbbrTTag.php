<?php

/**
 * Description of AbbrTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class AbbrTTag extends TapvirTagContainer{
    
    function __construct($abbervation, $textOrHtml, $useDefinitionTags = false,$class = null) {
    	
    	$attribute = 'title="'.$abbervation.'"';

    	if(!$useDefinitionTags){
    		
        	parent::__construct('abbr', $attribute, $textOrHtml, $echoOnTheGo);

    	}else{

    		$dfn = new TeaCTag('abbr',$class,$attribute,$textOrHtml,false);

    		$textOrHtml = $dfn->getThisContainerHtml();

        	parent::__construct('dfn', null, $textOrHtml, $echoOnTheGo);
    	}
    }

}