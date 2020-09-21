<?php

/**
 * Description of DivTapvirTagContainer
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class AnchorTTag extends TapvirTagContainer{
    
    function __construct($srcAddress = null, $textOrHtml = null, $class = null, $otherAttr = null) {
    	
    	 
        $srcLink = 'href="'.$srcAddress.'"';

        if($class !== null){
            $srcLink = $srcLink.' class = "'.$class.'"';
        }

        if($otherAttr !== null){
            $srcLink = $srcLink.' '.$otherAttr;
        }
        
        parent::__construct('a', $srcLink, $textOrHtml);
    }

}