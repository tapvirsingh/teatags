<?php

/**
 * Description of PasswordInputTapvirTag
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;

use Src\SingleTags\TapvirTags\{TextInputTapvirTag};

class InpTextTTag extends TextInputTapvirTag{
      function __construct($class = null ,$placeHolder  = null ,$extraAttribute = null) {
          
       $attribute = null;

        if($class !== null){
            $attribute = 'class = "'.$class.'"';
        } 

        if($extraAttribute !== null){
            $attribute = $attribute .' '.$extraAttribute;
        }
        
        parent::__construct($placeHolder,$attribute);
        
    }
}
