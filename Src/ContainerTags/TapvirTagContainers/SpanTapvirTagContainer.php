<?php

/**
 * Description of SpanTapvirTagContainer
 *
 * @author Tapvir Singh
 */
namespace Src\ContainerTags\TapvirTagContainers;
use Src\ContainerTags\TapvirTagContainer;

class SpanTapvirTagContainer extends TapvirTagContainer {
     
    function __construct($attribute, $textOrHtml = null) {
        parent::__construct('span', $attribute, $textOrHtml);
    }
}
