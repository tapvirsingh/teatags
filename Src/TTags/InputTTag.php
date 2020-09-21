<?php


/**
 * Description of InputTTag
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;

use Src\SingleTags\TapvirTags\{InputTapvirTag};

class InputTTag  extends InputTapvirTag{
    
     function __construct($type , $class = null, $placeHolder = null, $extraAttribute = null) {
        
       $attribute = null;

        if($class !== null){
            $attribute = 'class = "'.$class.'"';
        } 

        if($extraAttribute !== null){
            $attribute = $attribute .' '.$extraAttribute;
        }

        parent::__construct($type, $placeHolder ,$attribute );
        
    }
}
