<?php

/**
 * Description of EmailInputTapvirTag
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;

use Src\SingleTags\TapvirTags\{EmailInputTapvirTag};

class EmailTTag extends EmailInputTapvirTag{
     
    function __construct($class = null, $placeHolder = null ,$extraAttribute = null ) {
       
       $attribute = null;

        if($class !== null){
            $attribute = 'class = "'.$class.'"';
        } 

        if($extraAttribute !== null){
            $attribute = $attribute .' '.$extraAttribute;
        }


        parent::__construct($placeHolder ,$attribute);
        
    }
}
