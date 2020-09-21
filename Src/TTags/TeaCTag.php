<?php

/**
 * Description of TeaCTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class TeaCTag extends TapvirTagContainer{

     function __construct($tagName, $class = null, $textOrHtml = null,
        $extraAttribute = null){

        $attribute = null;

        if($class !== null){
            $attribute = 'class = "'.$class.'"';
        } 

        if($extraAttribute !== null){
            $attribute = $attribute .' '.$extraAttribute;
        }

        parent::__construct($tagName, $attribute, $textOrHtml);
     }

}