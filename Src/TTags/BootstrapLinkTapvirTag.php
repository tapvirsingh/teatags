<?php
/**
 * @author Tapvir Singh.
*/

/**
 * Description of BootstrapLinkTapvirTag
 *
 */

namespace Src\TTags;

use Src\SingleTags\TapvirTag;

class BootstrapLinkTapvirTag extends HeadLinkTapvirTag{
    // <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    function __construct($fileSize = 'min' ,  $rel="stylesheet") {

    	$rel = 'rel = "'.$rel.'"';
    	$href = 'href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap."';

    	if($fileSize == 'min'){
    		$href .= 'min.css';
    	}else{
    		$href .= 'css';
    	}

    	$extraAttribute = 'integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"';

        parent::__construct( $attribute,$extraAttribute,$rel);
    }

}
