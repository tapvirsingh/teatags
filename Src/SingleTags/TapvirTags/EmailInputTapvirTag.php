<?php

/**
 * Description of EmailInputTapvirTag
 *
 * @author Tapvir Singh.
 */

namespace Src\SingleTags\TapvirTags;

use Src\SingleTags\TapvirTag;

class EmailInputTapvirTag extends TapvirTag{
     
    function __construct($placeHolder  = null ,$extraAttribute = null) {
        $attribute = ' type = "Email"';
        if($placeHolder !== null){
            $attribute .= ' placeholder = "'.$placeHolder.'"';
        }
        parent::__construct('input', $attribute.' '.$extraAttribute);
        
    }
}
