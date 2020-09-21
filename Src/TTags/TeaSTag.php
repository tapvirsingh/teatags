<?php
/**
 * @author Tapvir Singh.
*/

/**
 * Description of HeadLinkTapvirTag
 *
 */
namespace Src\TTags;

use Src\SingleTags\TapvirTag;

class TeaSTag extends TapvirTag{
    
    function __construct($tagName, $class = null, $extraAttribute = null) {
    	
        $attribute = null;

        if($class !== null){
            $attribute = 'class = "'.$class.'"';
        } 

        if($extraAttribute !== null){
            $attribute = $attribute .' '.$extraAttribute;
        }


        parent::__construct($tagName, $attribute);
    }

}
