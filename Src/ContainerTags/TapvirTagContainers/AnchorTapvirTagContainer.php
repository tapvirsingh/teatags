<?php
/**
 * Description of AnchorTapvirTagContainer
 *
 * @author Tapvir Singh
 */
namespace Src\ContainerTags\TapvirTagContainers;
use Src\ContainerTags\TapvirTagContainer;

class AnchorTapvirTagContainer extends TapvirTagContainer{
    
     function __construct($srcAddress = null, $textOrHtml = null, $otherAttr = null) {
        
        $srcLink = ' href="'.$srcAddress.'" ';
    

        if($otherAttr !== null){
            $srcLink = $srcLink.' '.$otherAttr;
        }
        parent::__construct('a', $srcLink, $textOrHtml);
    }
}
