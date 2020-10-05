<?php

/**
 * Description of DivTapvirTagContainer
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class AnchorTTag extends TapvirTagContainer{
    
    function __construct($srcAddress = null, $data = null, $class = null, $otherAttr = null) {
    	$data = ttag_getData($data);
    	 
        $srcLink = 'href="'.$srcAddress.'"';

        if($class !== null){
            $srcLink = $srcLink.' class = "'.$class.'"';
        }

        if($otherAttr !== null){
            $srcLink = $srcLink.' '.$otherAttr;
        }
        
        parent::__construct('a', $srcLink, $data);
    }

}