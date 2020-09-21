<?php
namespace Src\TTags;
use Src\ContainerTags\TapvirTagContainer;

class HeadTitleTTag extends TapvirTagContainer{
    
    function __construct($text) {

        parent::__construct('title', null, $text);
    }

}