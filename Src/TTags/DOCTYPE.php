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

class DOCTYPE extends TapvirTag{
    
    function __construct() {
        parent::__construct('!DOCTYPE html', null,true);
    }

}
