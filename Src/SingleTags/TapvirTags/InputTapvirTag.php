<?php

/**
 * Description of InputTag
 *
 * @author Tapvir Singh.
 */

namespace Src\SingleTags\TapvirTags;

use Src\SingleTags\TapvirTag;

class InputTapvirTag  extends TapvirTag{

    protected $authorisedForValueAttr;
    
    
    protected function setAuthorisedAttrValues(){
        $this->authorisedForValueAttr = [
            'submit','button','hidden'
        ];
    }
    
    function __construct($type = null, $placeHolder  = null ,$extraAttribute = null) {

        $this->setAuthorisedAttrValues();

        if($type === null){
             $attribute = ' type = "Text"';
         }else{
            $attribute = ' type = "'.$type.'"';
         }
         
        if($placeHolder !== null){
            if(in_array($type, $this->authorisedForValueAttr)){
                $attribute .= ' value = "'.$placeHolder.'"';
            }else{
                $attribute .= ' placeholder = "'.$placeHolder.'"';
            }
        }
        parent::__construct('input', $attribute.' '.$extraAttribute);
        
    }
}
