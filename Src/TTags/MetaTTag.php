<?php

/**
 * Description of MetaTTag
 *
 * @author Tapvir Singh.
 */

namespace Src\TTags;

use Src\SingleTags\TapvirTag;

class MetaTTag extends TapvirTag{

	// Example code.
	// 'meta' => [
	// 				0 => [
	// 					'name' => 'viewport',
	// 					'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no'
	// 				],
	// 				1 => [
	// 					'http-equiv'=>'X-UA-Compatible',
	// 					'content'=>'IE=edge'
	// 				],
	// 			],

	function __construct($attributes) {

		$metaHtml = $this->createMetas($attributes);
        $this->setTagCode($metaHtml);		
    }

    // Creates all the meta tags
    private function createMetas($attributes){
    	$metas = null;
    	foreach ($attributes as $attribute) {
    		$metas[] = $this->createMetaTag($attribute);
    	}
    	return ttag_getCombinedHtml($metas);
    }

    // Creates the meta tag.
    private function createMetaTag($attribute){
    	$extraAttribute = null;
    	foreach ($attribute as $key => $value) {
    		$extraAttribute[] = $key.' = "'.$value.'"';

    	}
    	$extraAttribute = implode(' ',$extraAttribute);
    	
		$meta = new TeaSTag('meta',null, $extraAttribute);

		$metaHtml = $meta->get();

    	return $metaHtml;
    }


}