<?php

/**
 * Description of DivTapvirTagContainer
 *
 * @author Tapvir Singh.
 */

namespace Src\ContainerTags\TapvirTagContainers;
use Src\ContainerTags\TapvirTagContainer;

class DivTapvirTagContainer extends TapvirTagContainer{
    
    function __construct($attribute = null, $textOrHtml) {

        parent::__construct('div', $attribute, $textOrHtml);
    }

}