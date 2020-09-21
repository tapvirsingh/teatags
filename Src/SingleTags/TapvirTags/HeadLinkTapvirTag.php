<?php
/**
 * @author Tapvir Singh.
*/

/**
 * Description of HeadLinkTapvirTag
 *
 */
namespace Src\SingleTags\TapvirTags;

use Src\SingleTags\TapvirTag;

class HeadLinkTapvirTag extends TapvirTag{
    
    function __construct($href, $extraAttribute = null, $type = 'href', $rel="stylesheet") {

    	if($rel !== false){
    		$rel = 'rel = "'.$rel.'"';
    	}


    	$href = $type.'= "'.$href.'"';

    	$attribute = $rel.' '.$href;

        parent::__construct('link', $attribute.' '.$extraAttribute,false);
    }

}
