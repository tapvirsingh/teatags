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

        // global $ttag_Brand;
        // $brand = $ttag_Brand;
        $brand = include tta_NavBrandSettings('brand');

    	if(isset($brand['link']) && $brand['link'] != null){
    		// <a class="navbar-brand" href="#">Navbar</a>
    		$caption = null;
    		if(isset($brand['img']) && $brand['img'] != null){
				//     			<!-- Just an image -->
				//   <a class="navbar-brand" href="#">
				//     <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="" loading="lazy">
				//   </a>
    			$imgAttribute = ' class="d-inline-block align-top mr-2" width="30" height="30" alt="" loading="lazy"';

				$img = new ImgTTag(ttag_Image($brand['img']),$imgAttribute);
    			$caption = $img->getTagCode();
    		}
    		if(isset($brand['name'])){
    			if($caption === null){
    				$caption = $brand['name'];
    			}else{
    				$caption .= $brand['name'];
    			}
    		}

			// $attribute ='class="navbar-brand"';
    		if(isset($brand['font-family'])  && $brand['font-family'] !== null)
    			{
    				$attribute = ' style = "font-family:'.$brand['font-family'].' !important;"';
    			}	

            $brandContainer = new AnchorTTag($brand['link'],$caption,'navbar-brand',$attribute);

    	}else{
		// If the link is not set.
    		if(isset($brand['name'])){

				if(isset($brand['font-family'])  && $brand['font-family'] !== null)
    			{
    				$attribute = ' style = "font-family:'.$brand['font-family'].' !important;"';
    			}	

    			$brandContainer = new SpanTTag('navbar-brand mb-0 h1',$attribute,$brand['name']);
    		}
    	}

    	$this->setContainerCode($brandContainer->get());

      //  parent::__construct('div', $attribute, $textOrHtml);
    }



}