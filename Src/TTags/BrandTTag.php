<?php

/**
 * Description of BrandTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class BrandTTag extends TapvirTagContainer{
    
    function __construct() {

    	global $ttag_Brand;

    	if(isset($ttag_Brand['link']) && $ttag_Brand['link'] != null){
    		// <a class="navbar-brand" href="#">Navbar</a>
    		$caption = null;
    		if(isset($ttag_Brand['img']) && $ttag_Brand['img'] != null){
				//     			<!-- Just an image -->
				//   <a class="navbar-brand" href="#">
				//     <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="" loading="lazy">
				//   </a>
    			$imgAttribute = ' class="d-inline-block align-top mr-2" width="30" height="30" alt="" loading="lazy"';

				$img = new ImgTTag(ttag_Image($ttag_Brand['img']),$imgAttribute);
    			$caption = $img->getTagCode();
    		}
    		if(isset($ttag_Brand['name'])){
    			if($caption === null){
    				$caption = $ttag_Brand['name'];
    			}else{
    				$caption .= $ttag_Brand['name'];
    			}
    		}

			// $attribute ='class="navbar-brand"';
    		if(isset($ttag_Brand['font-family'])  && $ttag_Brand['font-family'] !== null)
    			{
    				$attribute = ' style = "font-family:'.$ttag_Brand['font-family'].' !important;"';
    			}	

            $brandContainer = new AnchorTTag($ttag_Brand['link'],$caption,'navbar-brand',$attribute);

    	}else{
		// If the link is not set.
    		if(isset($ttag_Brand['name'])){

				if(isset($ttag_Brand['font-family'])  && $ttag_Brand['font-family'] !== null)
    			{
    				$attribute = ' style = "font-family:'.$ttag_Brand['font-family'].' !important;"';
    			}	

    			$brandContainer = new SpanTTag('navbar-brand mb-0 h1',$attribute,$ttag_Brand['name']);
    		}
    	}

    	$this->setContainerCode($brandContainer->get());

      //  parent::__construct('div', $attribute, $textOrHtml);
    }



}