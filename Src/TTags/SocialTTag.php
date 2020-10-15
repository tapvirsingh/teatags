<?php

/**
 * Description of SocialTTag
 *
 * @author Tapvir Singh.
 */
namespace Src\TTags;

use Src\ContainerTags\TapvirTagContainer;

class SocialTTag extends TapvirTagContainer{

	// Pass the list as array of the social links
	function __construct($list, $size = 1){

		$social = include ttag_RootSettings('social');

		$socialClasses = include tta_NavBrandSettings('navbar');

		$links=null;

		foreach ($list as $key) {
			// Get the icon from social settings and create the 
			// font awsome icon in <i> tags. 
			 $ico = new FontAwsmTTag($social[$key]['icon'], $size);

			 $links[] = new AnchorTTag($social[$key]['link'], $ico , $socialClasses['social-classes'], 'target="_blank"');
			
		}

		$socialIcos = ttag_getCombinedHtml($links);

		$this->setCode($socialIcos);			
	}


}