<?php

/**
 * Description of SpanTapvirTagContainer
 *
 * @author Tapvir Singh
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class SpanTTag extends TapvirTagContainer {
     
    function __construct($class = null, $textOrHtml = null, $extraAttribute = null) {

        $attribute = null;

        if($class !== null){
            $attribute = 'class = "'.$class.'"';
        }

        if($extraAttribute !== null){
            $attribute = $attribute.' '.$extraAttribute;
        }

        parent::__construct('span', $attribute, $textOrHtml);
    }
}
