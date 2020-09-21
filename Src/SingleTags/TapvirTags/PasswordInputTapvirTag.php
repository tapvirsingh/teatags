<?php


/**
 * Description of PasswordInputTapvirTag
 *
 * @author Tapvir Singh.
 */

namespace Src\SingleTags\TapvirTags;

use Src\SingleTags\TapvirTag;

class PasswordInputTapvirTag extends TapvirTag{
      function __construct($placeHolder  = null ,$extraAttribute = null) {
        $attribute = ' type = "Password"';
        if($placeHolder !== null){
            $attribute .= ' placeholder = "'.$placeHolder.'"';
        }
        parent::__construct('input', $attribute.' '.$extraAttribute);
        
    }
}
