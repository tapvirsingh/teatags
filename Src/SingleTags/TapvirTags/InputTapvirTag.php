<?php

/**
 * Description of InputTag
 *
 * @author Tapvir Singh.
 */

namespace Src\SingleTags\TapvirTags;

use Src\SingleTags\TapvirTag;

class InputTapvirTag  extends TapvirTag{
    
     function __construct($type = null, $placeHolder  = null ,$extraAttribute = null) {
         if($type === null){
             $attribute = ' type = "Text"';
         }else{
            $attribute = ' type = "'.$type.'"';
         }
         
        if($placeHolder !== null){
            if($type === 'submit' || $type === 'button'){
                $attribute .= ' value = "'.$placeHolder.'"';
            }else{
                $attribute .= ' placeholder = "'.$placeHolder.'"';
            }
        }
        parent::__construct('input', $attribute.' '.$extraAttribute);
        
    }
}
