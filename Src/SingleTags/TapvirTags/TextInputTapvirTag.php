<?php

/**
 * Description of TextInputTapvirTag
 *
 * @author Tapvir Singh.
 */

namespace Src\SingleTags\TapvirTags;

use Src\SingleTags\TapvirTag;

class TextInputTapvirTag extends InputTapvirTag{
    
    function __construct($placeHolder  = null ,$extraAttribute = null) {
        parent::__construct('text',$placeHolder, $extraAttribute);
        
    }

}
