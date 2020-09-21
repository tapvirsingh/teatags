<?php

/**
 * Description of CodeTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainer;

class CodeTTag extends TapvirTagContainer{
    
    function __construct($attribute = null, $textOrHtml) {

        parent::__construct('code', $attribute, $textOrHtml);
    }

}