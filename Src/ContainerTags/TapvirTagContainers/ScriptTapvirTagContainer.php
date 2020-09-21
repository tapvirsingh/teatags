<?php
/**
 * Description of ScriptTapvirTagContainer
 *
 * @author Tapvir Singh
 */
namespace Src\ContainerTags\TapvirTagContainers;
use Src\ContainerTags\TapvirTagContainer;

class ScriptTapvirTagContainer extends TapvirTagContainer{
    
    function __construct($srcAddress = null, $textOrHtml = null, $type = ' type="text/javascript" ') {

    	$attribute = $type;
        if($srcAddress !== null){
	        $attribute = ' src="'.$srcAddress.'" '.$attribute;
        }

        parent::__construct('script', $attribute, $textOrHtml, false);
    }

}
